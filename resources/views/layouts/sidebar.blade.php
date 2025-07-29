<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon" aria-hidden="true">
                    <img src="{{ asset('images/logo-ksb.png') }}" alt="Logo"
                        style="width: 45px; height: 45px; margin-right: 9px;">
                </span>
                <div class="logo-text">
                    <span class="logo-title">KSB</span>
                    <span class="logo-subtitle">SIADIT</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->is('home') ? 'active' : '' }}" href="/">
                        <span class="icon home" aria-hidden="true"></span>
                        <span style="margin-top: 4px;">Dashboard</span>
                    </a>
                </li>

                <span class="system-menu__title">Master</span>
                {{-- SPK --}}
                <li>
                    <a class="show-cat-btn {{ request()->is('debitur*', 'muk*', 'log/tracking') ? 'active' : '' }}"
                        href="##">
                        <span class="icon master-spk" aria-hidden="true"></span>Master SPK
                        <span
                            class="category__btn transparent-btn {{ request()->is('debitur*', 'muk*', 'log/tracking') ? 'rotated' : '' }}"
                            title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="sub-menu {{ request()->is('debitur*', 'muk*', 'log/tracking') ? '' : 'd-none' }}">
                        <li>
                            <a href="{{ route('debitur.index') }}"
                                class="{{ request()->is('debitur*') ? 'active' : '' }}"
                                style="{{ request()->is('debitur*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                Data Debitur
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('muk.index') }}" class="{{ request()->is('muk*') ? 'active' : '' }}"
                                style="{{ request()->is('muk*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                Data MUK
                            </a>
                        </li>
                        <li>
                            <a class="{{ request()->is('log/tracking') ? 'active' : '' }}"
                                style="{{ request()->is('log/tracking') ? 'opacity: 1;' : '' }}"
                                href="{{ route('log-tracking') }}">
                                <span class="icon sub-icon"></span>
                                Tracking Kredit
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- PK --}}
                <li>
                    <a class="show-cat-btn {{ request()->is('pkpmk*', 'addendum*') ? 'active' : '' }}" href="##">
                        <span class="icon master-pk" aria-hidden="true"></span>Master PK
                        <span
                            class="category__btn transparent-btn {{ request()->is('pkpmk*', 'addendum*') ? 'rotated' : '' }}"
                            title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="sub-menu {{ request()->is('pkpmk*', 'addendum*') ? '' : 'd-none' }}">
                        <li>
                            <a href="{{ route('pkpmk.index') }}" class="{{ request()->is('pkpmk*') ? 'active' : '' }}"
                                style="{{ request()->is('pkpmk*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                Data PK/PMK
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('addendum.index') }}"
                                class="{{ request()->is('addendum*') ? 'active' : '' }}"
                                style="{{ request()->is('addendum*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                Data Addendum
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Rekap --}}
                <li>
                    <a class="show-cat-btn {{ request()->is('rekap*') ? 'active' : '' }}" href="##">
                        <span class="icon master-rekap" aria-hidden="true"></span>Rekap Data
                        <span class="category__btn transparent-btn {{ request()->is('rekap*') ? 'rotated' : '' }}"
                            title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="sub-menu {{ request()->is('rekap*') ? '' : 'd-none' }}">
                        <li>
                            <a href="{{ route('rekap.spk') }}" class="{{ request()->is('rekap*') ? 'active' : '' }}"
                                style="{{ request()->is('rekap*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                SPK
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('addendum.index') }}"
                                class="{{ request()->is('addendum*') ? 'active' : '' }}"
                                style="{{ request()->is('addendum*') ? 'opacity: 1;' : '' }}">
                                <span class="icon sub-icon"></span>
                                Data Addendum
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- Tracking Apht --}}
                <li>
                    <a class="{{ request()->is('apht*') ? 'active' : '' }}" href="/apht/tracking-index">
                        <span class="icon tracking-apht" aria-hidden="true"></span>
                        <span style="margin-top: 4px;">Tracking APHT</span>
                    </a>
                </li>
            </ul>


            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="{{ request()->is('log/activity') ? 'active' : '' }}"
                        href="{{ route('log-activity.index') }}">
                        <span class="icon log-activity" aria-hidden="true"></span>
                        Log Activity
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {{-- side footer --}}
    <div class="sidebar-footer">
        <a href="{{ route('profile.index') }}" class="sidebar-user" title="My Profile">
            <span class="sidebar-user-img" style="background-color: rgb(240, 240, 240);">
                <picture>
                    <img src="{{ Auth::user()->gambar != null
                        ? asset('images/profile_image/' . Auth::user()->gambar)
                        : asset('template/img/avatar/avatar-illustrated-02.webp') }}"
                        alt="Image Profile" style="width: 46px; height: 46px; object-fit: cover; ">
                </picture>
            </span>
            <div class="sidebar-user-info">
                @php
                    function shortenName($name, $maxLength = 9)
                    {
                        if (strlen($name) > $maxLength) {
                            $shortened = substr($name, 0, $maxLength) . '...';
                            return $shortened;
                        }
                        return $name;
                    }
                @endphp
                <span class="sidebar-user__title">{{ shortenName(Auth::user()->nama) }}</span>
                <span class="sidebar-user__subtitle">{{ Auth::user()->jabatan }}</span>
            </div>
        </a>
    </div>
</aside>
