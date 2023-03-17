<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html">
                    <span class="brand-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28" fill="currentColor" class="bi bi-hammer"
                            viewBox="0 0 16 16">
                            <path
                                d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                        </svg>
                    </span>
                    <h2 class="brand-text mb-0">Lelang Aja</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                        data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                        data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                    data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up" id="counter-notif">0</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                        </div>
                    </li>
                    @if (auth('frontend')->check())
                        <li class="scrollable-container media-list" id="notification-list">
                            {{-- @foreach (auth('frontend')->user()->notifications as $notification)
                                <a class="d-flex" href="#">
                                    <div class="list-item d-flex align-items-start">
                                        <div class="me-1">
                                            <div class="avatar"><img
                                                    src="../../../app-assets/images/portrait/small/avatar-s-15.jpg"
                                                    alt="avatar" width="32" height="32"></div>
                                        </div>
                                        <div class="list-item-body flex-grow-1">
                                            <p class="media-heading"><span class="fw-bolder">Hallo
                                                    {{ auth('frontend')->user()->nama_lengkap }} 🎉</span>!
                                            </p><small class="notification-text"> {{ $notification->message }}</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach --}}
                        </li>
                    @endif

                    @if (auth('frontend')->check())
                        <form id="form-readall" action="{{ route('patch.notfication') }}" method="POST">
                            @csrf
                            @method('PATCH')
                        </form>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100"
                                onclick="document.getElementById('form-readall').submit()" href="#">Baca semua</a>
                        </li>
                    @else
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Baca semua</a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder"
                            id="label-username">{{ auth('frontend')->check() ? auth('frontend')->user()->nama_lengkap : 'Guest' }}</span>
                        <span class="user-status">Masyarakat</span>
                    </div>
                    <span class="avatar">
                        <img class="round"
                            src="{{ auth('frontend')->check() && auth('frontend')->user()->avatar ? auth('frontend')->user()->avatar->url : '../../../app-assets//images/portrait/small/avatar-s-11.jpg' }}"
                            alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    @guest
                        <a class="dropdown-item" href="{{ route('login') }}">
                            <i class="me-50" data-feather="user"></i> Login
                        </a>
                    @else
                        <a onclick="event.preventDefault(); document.getElementById('form-logout').submit()"
                            class="dropdown-item" href=""><i class="me-50" data-feather="power"></i> Logout</a>

                        <form id="form-logout" action="{{ route('delete.logout.frontend') }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endguest
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75"
                    data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/axios.js') }}"></script>
@endpush
@if (auth('frontend')->check())
    @push('page-js')
        <script src="{{ asset('../app-assets/js/scripts/pages/frontend/notifications.js') }}"></script>
    @endpush
@endif
