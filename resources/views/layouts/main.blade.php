@include('layouts.header')
@yield('header')


<body>
    {{-- loading screen --}}
    <div id="loading-screen"
        style="display: none; justify-content: center; align-items: center; position: fixed; width: 100%; height: 100%; background: #000000bd;z-index: 9999; top: 0; left: 0;">
        <div
            style="display: flex; margin: auto; width: 100%; height: 100%; justify-content: center; align-items: center;">
            <img style="width: 300px;" src="{{ asset('images/loading.gif') }}" alt="Loading...">
        </div>
    </div>

    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">

        <!-- ! Sidebar -->
        @include('layouts.sidebar')

        <!-- ! Main nav -->
        <div class="main-wrapper">
            <nav class="main-nav--bg" style="height:  70px">
                <div class="container main-nav" style="margin-top: -12px;">
                    <div class="main-nav-start" style="margin-top: -10px;">
                        <div class="d-none d-md-inline-block d-flex justify-content-between text-center">
                            <a class="text-info mx-3" href="{{ route('log.version') }}" style="font-size: 14px;">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Baca Juknisnya!
                            </a>
                            <span style="height: 25px; color: #777777bd;">|</span>
                            <a class="text-info mx-3" href="{{ route('log.version') }}" style="font-size: 14px;">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Apa yang baru?
                            </a>
                        </div>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <img src="{{ Auth::user()->gambar != null
                                            ? asset('images/profile_image/' . Auth::user()->gambar)
                                            : asset('template/img/avatar/avatar-illustrated-02.webp') }}"
                                            alt="Image Profile"
                                            style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; border: 1px solid rgb(161, 161, 161)">
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href="{{ route('profile.index') }}">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </a></li>
                                <li><a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li>
                                <li>
                                    <a class="danger" href="" id="logout">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- ! Main -->
            {{-- konten --}}
            @yield('konten')



            <!-- ! Footer -->
            <footer class="footer shadow">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p> <?php echo date('Y'); ?> © TSI - <a href="#" target="_blank" rel="noopener noreferrer">KSB
                                SIADIT</a></p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="https://www.instagram.com/taufiq_fiq17?igsh=ZGJqdjBwbW9zeDc1&utm_source=qr"
                                target="__blank">About</a>
                        </li>
                        <li>&nbsp; | &nbsp;</li>
                        <li><a href="https://www.instagram.com/taufiq_fiq17?igsh=ZGJqdjBwbW9zeDc1&utm_source=qr"
                                target="__blank">Support</a>
                        </li>
                        <li>&nbsp; | &nbsp;</li>
                        <li><a href="https://www.instagram.com/taufiq_fiq17?igsh=ZGJqdjBwbW9zeDc1&utm_source=qr"
                                target="__blank">Puchase</a>
                        </li>
                        <li>&nbsp; | &nbsp;</li>
                        <li>Version 1.0.0</li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>


    @yield('footer')
    @include('layouts.footer')

</body>

</html>
