@extends('layouts.horizontal-menu-template.layout-full')
@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/toastr.min.css') }}">
@endpush
@push('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/extensions/ext-component-sliders.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
@endpush
@section('body')
    <!-- BEGIN: Header-->
    @include('frontend.components.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('frontend.components.main-menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Shop</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Lelang Aja</a>
                                    </li>
                                    <li class="breadcrumb-item active">Daftar Barang
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                        class="me-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                        class="me-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                    href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                    href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="content-detached content">
                <div class="content-body">
                    <!-- E-commerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                            data-bs-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i
                                                    data-feather="menu"></i></span>
                                        </button>
                                        <div class="search-results">{{ $lelang_count }} ditemukan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Content Section Starts -->

                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="body-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- E-commerce Search Bar Starts -->
                    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <input id="search-form" type="text" class="form-control search-product"
                                        id="shop-search" placeholder="Search Product" aria-label="Search..."
                                        aria-describedby="shop-search" />
                                    <script>
                                        document.getElementById('search-form').addEventListener('keydown', function(event) {
                                            if (event.keyCode == 13) {
                                                window.location = '/?search=' + document.getElementById('search-form').value;
                                            }
                                        });
                                    </script>
                                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Search Bar Ends -->

                    <!-- E-commerce Products Starts -->
                    <section id="ecommerce-products" class="grid-view">
                        @foreach ($lelang_list as $item)
                            <div class="card ecommerce-card">
                                <div class="item-img text-center">
                                    <a href="app-ecommerce-details.html">
                                        <img class="img-fluid card-img-top"
                                            src="@if (count($item->barang->images) < 1) ../../../app-assets/images/pages/eCommerce/1.png
                                      @else{{ $item->barang->images[0]->url }} @endif"
                                            alt="img-placeholder" width="350px" height="250px" /></a>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                        </div>
                                        <div>
                                            <h6 class="item-price">Rp
                                                {{ number_format($item->barang->harga_awal, 0, '.', '.') }}</h6>
                                        </div>
                                    </div>
                                    <h6 class="item-name">
                                        <a class="text-body"
                                            href="app-ecommerce-details.html">{{ $item->barang->nama_barang }}</a>
                                    </h6>
                                    <p class="card-text item-description">
                                        {{ Str::limit($item->barang->deskripsi_barang, 60) }}
                                    </p>
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-cost">
                                            <h4 class="item-price">Rp
                                                {{ number_format($item->barang->harga_awal, 0, '.', '.') }}</h4>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-light btn-wishlist">
                                        @if ($item->winner == null)
                                            <i data-feather="award"></i>
                                            <span>Belum ada</span>
                                            <a href="{{ route('tawar', [
                                                'lelang' => $item,
                                            ]) }}"
                                                class="btn btn-primary btn-cart">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                                                </svg>
                                                <span class="add-to-cart">Tawar</span>
                                            </a>
                                        @else
                                            <i data-feather="award"></i>
                                            <span>{{ $item->winner->nama_lengkap }}</span>
                                            <a href="{{ route('tawar', [
                                                'lelang' => $item,
                                            ]) }}"
                                                class="btn btn-primary btn-cart">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                                                </svg>
                                                <span class="add-to-cart">Lihat</span>
                                            </a>
                                        @endif

                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </section>
                    <!-- E-commerce Products Ends -->

                    <!-- E-commerce Pagination Starts -->
                    {{-- PAGINATE HERE --}}
                    {{ $lelang_list->appends(Request::only(['search']))->links('frontend.pagination.default') }}
                    <!-- E-commerce Pagination Ends -->

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('frontend.components.footer')
    <!-- END: Footer-->
@endsection
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/extensions/wNumb.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/toastr.min.js') }}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('../app-assets/js/scripts/pages/frontend/app-ecommerce.js') }}"></script>
@endpush
