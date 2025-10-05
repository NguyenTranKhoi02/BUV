<div class="header">
        <div class="header__stick">
            <div class="header-mflex">
                <div class="list--menu">
                    @if(get_current_locale() === 'en')
                        <a href="{{ route('en.page_home') }}" class="{{ get_menu_class(['en.page_home']) }}">
                            {{ trans_json('header.home') }}
                        </a>
                        <a href="{{ route('en.page_stories') }}" class="{{ get_menu_class(['en.page_stories']) }}">
                            {{ trans_json('header.stories') }}
                        </a>
                    @else
                        <a href="{{ route('page_home') }}" class="{{ get_menu_class(['page_home']) }}">
                            {{ trans_json('header.home') }}
                        </a>
                        <a href="{{ route('page_stories') }}" class="{{ get_menu_class(['page_stories']) }}">
                            {{ trans_json('header.stories') }}
                        </a>
                    @endif
                </div>

                <div class="box--langgue">
                    <div class="box--focus">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 9C1 4.58169 4.58169 1 9 1C13.4183 1 17 4.58169 17 9C17 13.4183 13.4183 17 9 17C4.58169 17 1 13.4183 1 9Z" fill="#777777" fill-opacity="0.4"></path>
                                <path d="M13.5314 3.592C13.3684 3.719 13.1584 3.776 12.9544 3.743C11.8404 3.568 11.0444 3.663 10.7734 4.002C10.5534 4.276 10.6044 4.832 10.6494 5.322C10.7114 6.001 10.7884 6.845 10.0824 7.295C9.45254 7.69491 8.80068 7.37513 8.32371 7.14115C7.89771 6.93215 7.49241 6.734 7.07441 6.85C6.54641 6.996 6.25641 7.539 6.20341 7.646C5.95941 8.141 6.05441 8.663 6.18141 9.022C7.46541 8.769 8.55941 8.90099 9.44041 9.41699C9.87122 9.66976 10.2149 10.0146 10.5324 10.395C10.7814 10.694 10.8554 10.767 11.0124 10.796C11.2854 10.851 11.5554 10.672 11.9714 10.383C12.5451 9.9828 13.1616 9.6273 13.8894 9.76499C14.6594 9.91099 15.2714 10.525 15.7544 11.618C15.9351 11.9641 16.0582 12.2997 16.1302 12.6246C14.8059 15.2191 12.1066 17 8.99945 17C8.53467 17 8.07902 16.9602 7.63573 16.8837C7.75461 16.4639 7.87246 16.0473 7.87841 16.026C7.95141 15.77 8.09141 15.128 7.81241 14.71C7.71641 14.565 7.61241 14.506 7.38641 14.387C6.97403 14.1698 6.61706 13.9044 6.37241 13.498C6.10051 13.0467 6.05291 12.5651 6.08041 12.051C6.09541 11.788 6.10641 11.58 6.01241 11.318C5.88341 10.96 5.62841 10.719 5.33441 10.499C5.17375 10.3613 4.98599 10.2495 4.81341 10.127C3.72641 9.33299 2.84641 8.135 2.16441 6.601C1.98274 6.2386 1.85709 5.88887 1.78125 5.55215C3.07148 2.86207 5.82222 1 8.99945 1C11.0175 1 12.8635 1.75122 14.2725 2.98868L13.5314 3.592Z" fill="#777777"></path>
                            </svg>
                        </span>

                        <span class="txt">
                            @if(get_current_locale() === 'en')
                                {{ trans_json('header.language.eng') }}
                            @else
                                {{ trans_json('header.language.vie') }}
                            @endif
                        </span>

                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 8.61859L12 15.6621L19 8.61859L18.0494 7.66211L12 13.7492L5.95057 7.66211L5 8.61859Z" fill="#777777"></path>
                            </svg>
                        </span>
                    </div>

                    <div class="box--show">
                        <div class="list-lg">
                            <a href="{{ route('language.switch', 'vi') }}" class="item-lg {{ is_current_locale('vi') ? 'active' : '' }}">
                                <span class="icon">
                                    @if(is_current_locale('vi'))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M13.3332 4L5.99984 11.3333L2.6665 8" stroke="#777777" stroke-width="2"></path>
                                    </svg>
                                    @endif
                                </span>
                                <span class="txt">
                                    {{ trans_json('header.language.vie') }}
                                </span>
                            </a>
                            <a href="{{ route('language.switch', 'en') }}" class="item-lg {{ is_current_locale('en') ? 'active' : '' }}">
                                <span class="icon">
                                    @if(is_current_locale('en'))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M13.3332 4L5.99984 11.3333L2.6665 8" stroke="#777777" stroke-width="2"></path>
                                    </svg>
                                    @endif
                                </span>
                                <span class="txt">
                                    {{ trans_json('header.language.eng') }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>