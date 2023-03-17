@extends('layouts.horizontal-menu-template.layout-blank')
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/pages/authentication.css') }}">
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="currentColor" class="bi bi-hammer"
                                  viewBox="0 0 16 16">
                                  <path
                                      d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                              </svg>
                                    <h2 class="brand-text text-primary ms-1">Lelang Aja</h2>
                                </a>

                                <h4 class="card-title mb-1">Selamat datang Masyarkat! 👋</h4>
                                <p class="card-text mb-2">Masuk dan berikan tawaranmu</p>

                                <form class="auth-login-form mt-2" action="{{ route('post.login.frontend') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text"
                                            class="form-control @error('username')
                                  error
                                  @enderror"
                                            id="username" name="username" placeholder="john@example.com"
                                            aria-describedby="username" tabindex="1" autofocus />
                                        @error('username')
                                            <span id="basic-default-name-error" class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                            <a href="auth-forgot-password-basic.html">
                                                <small>Forgot Password?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password"
                                                class="form-control form-control-merge @error('password')
                                            error
                                            @enderror"
                                                id="password" name="password" tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                            @error('password')
                                                <span id="basic-default-name-error" class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-me"
                                                tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Ingat Saya? </label>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <a href="{{ route('register') }}">Register</a>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4">Masuk</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection