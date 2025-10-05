@extends('layout.master')
@section('title'){{ config('metapage.Home.title') }}@endsection
@section('description'){{ config('metapage.Home.description') }}@endsection
@section('keywords'){{ config('metapage.Home.keywords') }}@endsection
@section('news_keywords'){{ config('metapage.Home.news_keywords') }}@endsection
@section('og-title'){{ config('metapage.Home.og:title') }}@endsection
@section('og-description'){{ config('metapage.Home.og:description') }}@endsection
@section('OgUrl'){{ config('siteInfo.url').Request::getPathInfo() }}@endsection
@section('OgImage'){{ config('metapage.Home.og:image') }}@endsection
@section('logo_home')@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
        <div class="section__flax--text">
            <div class="wrap-top--banner">
                <div class="banner-lion wtb-people">
                    <img src="./images/lion.png" alt="">
                </div>
                <div class="banner-2d wtb-codo">
                    <img src="./images/BUVCrystals2D.png" alt="">
                </div>
            </div>

            <div class="box--wrap wtb-title">
                <div class="box-cnt">
                    <a href="" class="logo">
                        <img src="./images/logo.png" alt="">
                    </a>

                    <h2 class="title-effect">
                        {{ trans_json('pages.home.main_title') }}
                    </h2>

                    <p class="des">
                        {{ trans_json('pages.home.main_description') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="section__leading">
            <div class="list--leading wtb-leading">
                <div class="item--leading">
                    <a href="" class="avatar">
                        <img src="./images/leading1.png" alt="">
                    </a>

                    <div class="content">
                        <h3 class="title-item-text">
                            <a href="" class="titlle-link">
                                {{ trans_json('pages.home.leading.title') }}
                            </a>
                        </h3>

                        <p class="sapo">
                            {{ trans_json('pages.home.leading.description') }}
                        </p>
                    </div>
                </div>
                <div class="item--leading">
                    <a href="" class="avatar">
                        <img src="./images/leading2.png" alt="">
                    </a>

                    <div class="content">
                        <h3 class="title-item-text">
                            <a href="" class="titlle-link">
                                {{ trans_json('pages.home.caring.title') }}
                            </a>
                        </h3>

                        <p class="sapo">
                            {{ trans_json('pages.home.caring.description') }}
                        </p>
                    </div>
                </div>
                <div class="item--leading">
                    <a href="" class="avatar">
                        <img src="./images/leading3.png" alt="">
                    </a>

                    <div class="content">
                        <h3 class="title-item-text">
                            <a href="" class="titlle-link">
                                {{ trans_json('pages.home.resilient.title') }}
                            </a>
                        </h3>

                        <p class="sapo">
                            {{ trans_json('pages.home.resilient.description') }}
                        </p>
                    </div>
                </div>
                <div class="item--leading">
                    <a href="" class="avatar">
                        <img src="./images/leading4.png" alt="">
                    </a>

                    <div class="content">
                        <h3 class="title-item-text">
                            <a href="" class="titlle-link">
                                {{ trans_json('pages.home.confident.title') }}
                            </a>
                        </h3>

                        <p class="sapo">
                            {{ trans_json('pages.home.confident.description') }}
                        </p>
                    </div>
                </div>
                <div class="item--leading">
                    <a href="" class="avatar">
                        <img src="./images/leading5.png" alt="">
                    </a>

                    <div class="content">
                        <h3 class="title-item-text">
                            <a href="" class="titlle-link">
                                {{ trans_json('pages.home.strategic.title') }}
                            </a>
                        </h3>

                        <p class="sapo">
                            {{ trans_json('pages.home.strategic.description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section__banner--web">
            <div class="item-banner">
                <!-- Desktop image -->
                <img src="{{ trans_json('pages.home.banner.desktop_image') }}" alt="{{ trans_json('pages.home.banner.alt_text') }}" class="banner-desktop">
                
                <!-- Mobile image -->
                <img src="{{ trans_json('pages.home.banner.mobile_image') }}" alt="{{ trans_json('pages.home.banner.alt_text') }}" class="banner-mobile">
            </div>
        </div>
        
        <style>
        /* Desktop image - show by default */
        .section__banner--web .item-banner .banner-desktop {
            max-width: 1172px;
        }
        
        /* Mobile image - hide by default */
        .section__banner--web .item-banner .banner-mobile {
            display: none;
        }
        
        /* Mobile responsive */
        @media screen and (max-width: 768px) {
            .section__banner--web .item-banner .banner-desktop {
                display: none !important;
            }
            .section__banner--web .item-banner .banner-mobile {
                display: block !important;
            }
        }
        
        </style>

        <div class="section__lett--your">
            <div class="box--lett">
                <h3 class="title-effect">
                    {{ trans_json('pages.stories.title') }}
                </h3>

                <div class="list--tab">
                    <a href="#" class="item--tab active" data-category="all">
                        {{ trans_json('pages.stories.tabs.all') }}
                    </a>
                    <a href="#" class="item--tab" data-category="resilient">
                        {{ trans_json('pages.stories.tabs.resilient') }}
                    </a>
                    <a href="#" class="item--tab" data-category="caring">
                        {{ trans_json('pages.stories.tabs.caring') }}
                    </a>
                    <a href="#" class="item--tab" data-category="leading">
                        {{ trans_json('pages.stories.tabs.leading') }}
                    </a>
                    <a href="#" class="item--tab" data-category="confident">
                        {{ trans_json('pages.stories.tabs.confident') }}
                    </a>
                    <a href="#" class="item--tab" data-category="strategic">
                        {{ trans_json('pages.stories.tabs.strategic') }}
                    </a>
                </div>

                <div class="box--content">
                    <div class="content">
                        <div class="box--new-sw">
                            <div class="box-category" data-layout="1" data-key="keycd">
                                <div class="box-category-middle">
                                    <div class="swiper box-new-sw">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="box-flex--wrap">
                                                    @include('home.stories-section', ['start' => 0, 'end' => 6])
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="box-flex--wrap">
                                                    @include('home.stories-section', ['start' => 6, 'end' => 12])
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="box-flex--wrap">
                                                    @include('home.stories-section', ['start' => 12, 'end' => 18])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-new-sw-pagination"></div>
                                    </div>
                                    <div class="box-new-sw-prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.7071 5.29289C15.3166 4.90237 14.6834 4.90237 14.2929 5.29289L8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L14.2929 18.7071C14.6834 19.0976 15.3166 19.0976 15.7071 18.7071C16.0976 18.3166 16.0976 17.6834 15.7071 17.2929L10.4142 12L15.7071 6.70711C16.0976 6.31658 16.0976 5.68342 15.7071 5.29289Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <div class="box-new-sw-next">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.29289 19.2071C8.68342 19.5976 9.31658 19.5976 9.70711 19.2071L15.7071 13.2071C16.0976 12.8166 16.0976 12.1834 15.7071 11.7929L9.70711 5.79289C9.31659 5.40237 8.68342 5.40237 8.2929 5.79289C7.90237 6.18342 7.90237 6.81658 8.2929 7.20711L13.5858 12.5L8.29289 17.7929C7.90237 18.1834 7.90237 18.8166 8.29289 19.2071Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
