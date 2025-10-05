// Function to safely destroy existing Swiper
function destroySwiper() {
  if (window.swiperInstance) {
    try {
      if (typeof window.swiperInstance.destroy === 'function') {
        window.swiperInstance.destroy(true, true);
      }
    } catch (error) {
      console.log('Error destroying swiper:', error);
    }
    window.swiperInstance = null;
  }
}

// Function to initialize/reinitialize Swiper
function initializeSwiper() {
  // Destroy existing swiper if it exists
  destroySwiper();
  
  // Small delay to ensure DOM is ready and destroyed properly
  setTimeout(function() {
    if ($('.box-new-sw').length > 0) {
      // Count total slides
      const totalSlides = $('.swiper-slide').length;
      console.log(`Initializing Swiper with ${totalSlides} slides`);
      
      if (totalSlides > 0) {
        window.swiperInstance = new Swiper(".box-new-sw", {
          slidesPerView: 1,
          spaceBetween: 8,
          loop: false,
          
          pagination: {
            el: ".box-new-sw-pagination",
            clickable: true,
            dynamicBullets: false, // Tắt dynamic bullets để tránh auto width
          },

          navigation: {
            nextEl: ".box-new-sw-next",
            prevEl: ".box-new-sw-prev",
          },
          
          on: {
            init: function() {
              console.log(`Swiper initialized with ${this.slides.length} slides`);
              // Xóa inline styles mà Swiper tự động thêm
              setTimeout(() => {
                $('.box-new-sw-pagination').removeAttr('style').css('width', '');
              }, 50);
            },
            slideChange: function() {
              // Xóa inline styles sau mỗi lần slide change  
              setTimeout(() => {
                $('.box-new-sw-pagination').removeAttr('style').css('width', '');
              }, 50);
            }
          }
        });
      } else {
        console.log('No slides found');
      }
    }
  }, 300);
}

$(document).ready(function () {
  // console.log(1, $(".header").offset().top);

  $(".header__stick .box--langgue .box--focus").click(function (e) {
    e.preventDefault();
    $(".box--langgue").toggleClass("show");
  });

  //Bổ sung xử lý filter theo category của stories
  $('.item--tab').click(function(e) {
    e.preventDefault();
    
    const selectedCategory = $(this).data('category');
    
    // Update active tab
    $('.item--tab').removeClass('active');
    $(this).addClass('active');
    
    // Filter stories
    filterStories(selectedCategory);
    
    // Reinitialize swiper after filtering with a delay to ensure DOM is updated
    setTimeout(function() {
      initializeSwiper();
    }, 500);
  });
  
});

// Store original items and their positions for reset
let originalItemsData = [];

// Function to save original items structure
function saveOriginalItemsStructure() {
  if (originalItemsData.length === 0) {
    $('.swiper-slide').each(function(slideIndex) {
      const items = $(this).find('.box-category-item');
      items.each(function(itemIndex) {
        originalItemsData.push({
          element: $(this)[0].outerHTML, // Store HTML instead of detaching
          data: $(this).data(),
          slideIndex: slideIndex,
          itemIndex: itemIndex
        });
      });
    });
    console.log(`Saved ${originalItemsData.length} original items`);
  }
}

// Function to restore original structure
function restoreOriginalStructure() {
  // Clear all slides first
  $('.swiper-slide .box-flex--wrap').empty();
  
  // Group items by slide index
  const itemsBySlide = {};
  let maxSlideIndex = 0;
  
  originalItemsData.forEach(function(itemData) {
    if (!itemsBySlide[itemData.slideIndex]) {
      itemsBySlide[itemData.slideIndex] = [];
    }
    itemsBySlide[itemData.slideIndex].push(itemData);
    maxSlideIndex = Math.max(maxSlideIndex, itemData.slideIndex);
  });
  
  // Remove excess slides
  $('.swiper-slide').each(function(index) {
    if (index > maxSlideIndex) {
      $(this).remove();
    }
  });
  
  // Add slides if needed
  const existingSlides = $('.swiper-slide').length;
  const neededSlides = maxSlideIndex + 1;
  for (let i = existingSlides; i < neededSlides; i++) {
    const newSlide = `<div class="swiper-slide">
      <div class="box-flex--wrap"></div>
    </div>`;
    $('.swiper-wrapper').append(newSlide);
  }
  
  // Restore items to their original slides
  Object.keys(itemsBySlide).forEach(function(slideIndex) {
    const slide = $('.swiper-slide').eq(parseInt(slideIndex));
    const wrapper = slide.find('.box-flex--wrap');
    
    itemsBySlide[slideIndex].forEach(function(itemData) {
      const $element = $(itemData.element);
      // Restore data attributes
      Object.keys(itemData.data).forEach(function(key) {
        $element.attr('data-' + key, itemData.data[key]);
      });
      wrapper.append($element);
    });
  });
  
  console.log('Restored original structure');
}

// Function to filter stories by category
function filterStories(category) {
    // Save original structure if not already saved
  saveOriginalItemsStructure();
  
  if (category === 'all') {
    // Restore original layout for 'all' category
    restoreOriginalStructure();
    return;
  }
  
  // Fallback: If no original data, just show/hide items
  if (originalItemsData.length === 0) {
    console.log('No original data saved, using simple show/hide');
    $('.box-category-item').each(function() {
      const itemCategories = $(this).data('categories');
      if (itemCategories && itemCategories.toString().includes(category)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
    return;
  }  // Collect filtered items HTML
  const filteredItems = [];
  originalItemsData.forEach(function(itemData) {
    const itemCategories = itemData.data.categories;
    if (itemCategories && itemCategories.toString().includes(category)) {
      const $element = $(itemData.element);
      // Restore data attributes
      Object.keys(itemData.data).forEach(function(key) {
        $element.attr('data-' + key, itemData.data[key]);
      });
      filteredItems.push($element);
    }
  });
  
  console.log(`Filtered ${filteredItems.length} items for category: ${category}`);
  
  // Clear all slides
  $('.swiper-slide .box-flex--wrap').empty();
  
  if (filteredItems.length === 0) {
    console.log('No items to display');
    return;
  }
  
  // Redistribute items into slides (6 items per slide)
  const itemsPerSlide = 6;
  const totalSlides = Math.ceil(filteredItems.length / itemsPerSlide);
  
  // Remove excess slides
  $('.swiper-slide').each(function(index) {
    if (index >= totalSlides) {
      $(this).remove();
    }
  });
  
  // Add more slides if needed
  const existingSlides = $('.swiper-slide').length;
  for (let i = existingSlides; i < totalSlides; i++) {
    const newSlide = `<div class="swiper-slide">
      <div class="box-flex--wrap"></div>
    </div>`;
    $('.swiper-wrapper').append(newSlide);
  }
  
  // Populate slides with filtered items
  for (let slideIndex = 0; slideIndex < totalSlides; slideIndex++) {
    const slide = $('.swiper-slide').eq(slideIndex);
    const slideWrapper = slide.find('.box-flex--wrap');
    
    // Add items to this slide
    const startIndex = slideIndex * itemsPerSlide;
    const endIndex = Math.min(startIndex + itemsPerSlide, filteredItems.length);
    
    for (let itemIndex = startIndex; itemIndex < endIndex; itemIndex++) {
      if (filteredItems[itemIndex]) {
        slideWrapper.append(filteredItems[itemIndex]);
      }
    }
  }
  
  console.log(`Redistributed items into ${totalSlides} slides`);
}

// Khởi tạo Swiper sau khi DOM ready
$(document).ready(function () {
  // Đợi một chút để đảm bảo CSS đã load
  setTimeout(function () {
    console.log('DOM ready, checking structure...');
    console.log('Number of swiper slides:', $('.swiper-slide').length);
    console.log('Number of story items:', $('.box-category-item').length);
    
    // Save original structure before initializing swiper
    saveOriginalItemsStructure();
    initializeSwiper();
  }, 500);
});

gsap.registerPlugin(ScrollTrigger);
gsap.to(".wtb-leading", {
  y: -150,
  scale: 0.95,
  opacity: 0.8,
  ease: "power2.out",
  scrollTrigger: {
    trigger: ".section__leading",
    start: "top center",
    end: "bottom top",
    scrub: 0.5,
    markers: false,
  },
});

gsap.to(".wtb-title", {
  y: -100,
  ease: "none",
  scrollTrigger: {
    trigger: ".section__flax--text",
    start: "bottom bottom",
    end: "top top",
    scrub: true,
    markers: false, // <-- debug markers enabled
  },
});

gsap.to(".wtb-title", {
  y: -100,
  ease: "none",
  scrollTrigger: {
    trigger: ".detail__flax--text",
    start: "bottom bottom",
    end: "top top",
    scrub: true,
    markers: false, // <-- debug markers enabled
  },
});

gsap.to(".wtb-people", {
  y: -200,
  ease: "none",
  scrollTrigger: {
    trigger: ".wrap-top--banner",
    start: "top top",
    end: "bottom top",
    scrub: true,
    markers: false, // <-- debug markers enabled
  },
});
gsap.to(".wtb-codo", {
  y: -300,
  ease: "none",
  scrollTrigger: {
    trigger: ".wrap-top--banner",
    start: "top top",
    end: "bottom top",
    scrub: true,
    markers: false, // <-- debug markers enabled
  },
});

// Hàm fade in từ dưới lên khi scroll
function fadeInOnScroll(selector, options = {}) {
  const defaults = {
    y: 50,
    opacity: 0,
    duration: 0.8,
    ease: "power2.out",
    delay: 0,
    stagger: 0.2,
  };

  const settings = { ...defaults, ...options };

  // Set initial state - ẩn elements
  gsap.set(selector, {
    y: settings.y,
    opacity: settings.opacity,
  });

  // Animate khi scroll đến
  gsap.to(selector, {
    y: 0,
    opacity: 1,
    duration: settings.duration,
    ease: settings.ease,
    stagger: settings.stagger,
    scrollTrigger: {
      trigger: selector,
      start: "top 90%",
      end: "bottom 10%",
      toggleActions: "play reverse play reverse",
      markers: false,
      onEnter: () => {
        // Animation khi scroll xuống vào vùng trigger
        gsap.to(selector, {
          y: 0,
          opacity: 1,
          duration: settings.duration,
          ease: settings.ease,
          stagger: settings.stagger,
        });
      },
      onLeave: () => {
        // Animation khi scroll xuống ra khỏi vùng trigger
        gsap.to(selector, {
          y: -30,
          opacity: 0.3,
          duration: settings.duration * 0.6,
          ease: "power2.in",
          stagger: settings.stagger * 0.5,
        });
      },
      onEnterBack: () => {
        // Animation khi scroll lên vào vùng trigger
        gsap.to(selector, {
          y: 0,
          opacity: 1,
          duration: settings.duration,
          ease: settings.ease,
          stagger: settings.stagger,
        });
      },
      onLeaveBack: () => {
        // Animation khi scroll lên ra khỏi vùng trigger
        gsap.to(selector, {
          y: settings.y,
          opacity: settings.opacity,
          duration: settings.duration * 0.6,
          ease: "power2.in",
          stagger: settings.stagger * 0.5,
        });
      },
    },
  });
}

// Áp dụng fade in cho các elements
$(document).ready(function () {
  // Fade in cho các section
  fadeInOnScroll(".section__leading .item--leading", { y: 60, stagger: 0.3 });
  fadeInOnScroll(".section__flax--text .content", { y: 80, delay: 0.2 });
  fadeInOnScroll(".section__flax--text .box-cnt", { y: 90, stagger: 0.15 });
  fadeInOnScroll(".section__banner--web .item-banner", {
    y: 90,
    stagger: 0.15,
  });

  // Fade in cho các item trong list
  fadeInOnScroll(".list--tab .item--tab", { y: 30, stagger: 0.1 });
  fadeInOnScroll(".section__lett--your .box--content", {
    y: 40,
    stagger: 0.15,
  });

  // Fade in cho header/footer nếu có
  fadeInOnScroll(".footer", { y: 40 });
});
