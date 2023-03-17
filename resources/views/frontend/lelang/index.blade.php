@extends('layouts.horizontal-menu-template.layout-full')
@push('vendor-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendor/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-validation.css') }}">
@endpush
@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/pages/app-ecommerce-details.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-number-input.css') }}">
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
                            <h2 class="content-header-title float-start mb-0">Product Details</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="app-ecommerce-shop.html">Shop</a>
                                    </li>
                                    <li class="breadcrumb-item active">Details
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
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
                </div>
            </div>
            <div class="content-body">
                <!-- app e-commerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <!-- Product Details starts -->
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="@if (count($barang->images) < 1) ../../../app-assets/images/pages/eCommerce/1.png
                                        @else{{ $barang->images[0]->url }} @endif"
                                            class="img-fluid product-img" alt="product image" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <h4>{{ $barang->nama_barang }}</h4>
                                    <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                        <h4 class="item-price me-1">Mulai dari Rp
                                            {{ number_format($barang->harga_awal, 0, '.', '.') }}</h4>
                                    </div>
                                    @if ($lelang->winner == null)
                                        <p class="card-text">Pemenang - <span class="text-error">Belum ada</span></p>
                                    @else
                                        <p class="card-text">Pemenang - <span
                                                class="font-bold text-danger">{{ $lelang->winner->nama_lengkap }}</span>
                                        </p>
                                    @endif
                                    <p class="card-text">
                                        {{ $barang->deskripsi_barang }}
                                    </p>
                                    <hr />
                                    <div class="d-flex flex-column flex-sm-row pt-1">
                                        @guest('frontend')
                                            <a href="{{ route('login') }}"
                                                class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                                <i data-feather="user" class="me-50"></i>
                                                <span class="add-to-cart">Masuk</span>
                                            </a>
                                        @else
                                            @if ($submited !== null && $submited->id_user == auth('frontend')->user()->id_user)
                                                <a href="#" class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                                    <i data-feather="shopping-cart" class="me-50"></i>
                                                    <span class="add-to-cart">Anda telah memasang tawaran sebesar Rp
                                                        {{ number_format($submited->penawaran_harga, 0, '.', '.') }}</span>
                                                </a>
                                            @elseif ($submited !== null && $submited->id_user !== auth('frontend')->user()->id_user)
                                                <a href="#" class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                                    <i data-feather="shopping-cart" class="me-50"></i>
                                                    <span class="add-to-cart">Anda tidak berpartisipasi</span>
                                                </a>
                                            @elseif ($submited == null && $lelang->tgl_lelang > now()->toDateString())
                                                <a href="#"
                                                    class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                                    <i data-feather="shopping-cart" class="me-50"></i>
                                                    <span class="add-to-cart">Tawaran dimulai pada {{ $lelang->tgl_lelang }}</span>
                                                </a>
                                            @else
                                                <a data-bs-toggle='modal' data-bs-target='#modal-tawaran' href="#"
                                                    class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                                    <i data-feather="shopping-cart" class="me-50"></i>
                                                    <span class="add-to-cart">Tawar</span>
                                                </a>
                                            @endif
                                        @endguest

                                        <div class="btn-group dropdown-icon-wrapper btn-share">
                                            <button type="button"
                                                class="btn btn-icon hide-arrow btn-outline-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="share-2"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">
                                                    <i data-feather="facebook"></i>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    <i data-feather="twitter"></i>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    <i data-feather="youtube"></i>
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    <i data-feather="instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details ends -->

                        <!-- Item features starts -->
                        <div class="item-features">
                            <div class="row text-center">
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i data-feather="award"></i>
                                        <h4 class="mt-2 mb-1">100% Original</h4>
                                        <p class="card-text">Chocolate bar candy canes ice cream toffee. Croissant pie
                                            cookie halvah.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i data-feather="clock"></i>
                                        <h4 class="mt-2 mb-1">10 Day Replacement</h4>
                                        <p class="card-text">Marshmallow biscuit donut dragée fruitcake. Jujubes wafer
                                            cupcake.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i data-feather="shield"></i>
                                        <h4 class="mt-2 mb-1">1 Year Warranty</h4>
                                        <p class="card-text">Cotton candy gingerbread cake I love sugar plum I love sweet
                                            croissant.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item features ends -->

                        @if (auth('cms')->check())
                            <!-- Related Products starts -->
                            <div class="card-body">
                                <div class="mt-4 mb-2 text-center">
                                    <h4>Daftar Penawaran</h4>
                                    <p class="card-text">Hallo {{ ucfirst(auth('cms')->user()->level->level) }} {{ auth('cms')->user()->nama_petugas }}, berikut semua
                                        daftar penawaran pada lelang ini</p>
                                </div>
                                <div class="card px-4 py-2">
                                    <div class="card-datatable table-responsive pt-0">
                                        <form id="form-delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <table class="user-list-table table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Ranking</th>
                                                    <th>User</th>
                                                    <th>Tawaran</th>
                                                    {{-- <th></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($participans as $rank => $history)
                                                    <tr>
                                                        <td>
                                                            <span class="text-nowrap">#{{ $rank + 1 }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="avatar-wrapper">
                                                                    <div class="avatar colorClass me-1">
                                                                        <img src="{{ $history->user->avatar == null ? '../../../app-assets//images/portrait/small/avatar-s-11.jpg' : $history->user->avatar->url }}"
                                                                            alt="Avatar" height="32" width="32">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <a href=""
                                                                        class="user_name text-truncate text-body">
                                                                        <span
                                                                            class="fw-bolder">{{ $history->user->nama_lengkap }}</span>
                                                                    </a>
                                                                    <small class="emp_post text-muted">Username:
                                                                        {{ $history->user->username }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <small class="text-nowrap">Rp
                                                                {{ number_format($history->penawaran_harga, 0, '.', '.') }}</small>
                                                        </td>
                                                        {{-- <td>
                                                            @if ($history->user->id_user == (auth('frontend')->user() == null ? 0 : auth('frontend')->user()->id_user))
                                                                <div class="btn-group">
                                                                    <a class="btn btn-sm dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-more-vertical font-small-4">
                                                                            <circle cx="12" cy="12"
                                                                                r="1">
                                                                            </circle>
                                                                            <circle cx="12" cy="5"
                                                                                r="1">
                                                                            </circle>
                                                                            <circle cx="12" cy="19"
                                                                                r="1">
                                                                            </circle>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a href="javascript:;"
                                                                            class="dropdown-item delete-record"
                                                                            onclick="
                                                                        let form = document.getElementById('form-delete');
                                                                        form.setAttribute('action', '{{ route('delete.tawaran', [
                                                                            'lelang' => $lelang,
                                                                            'history' => $history,
                                                                        ]) }}');
                                                                        form.submit();
                                                                      ">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash-2 font-small-4 me-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                                <line x1="10" y1="11"
                                                                                    x2="10" y2="17"></line>
                                                                                <line x1="14" y1="11"
                                                                                    x2="14" y2="17"></line>
                                                                            </svg>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Related Products ends -->
                        @endif
                    </div>
                </section>
                <!-- app e-commerce details end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @if ($submited !== null)
        {{-- @include('frontend.lelang.modal-edit') --}}
    @else
        @include('frontend.lelang.modal-add')
    @endif
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('frontend.components.footer')
    <!-- END: Footer-->
@endsection
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/tables/datatable/dataTables.rowGroup.min.js') }}}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('../app-assets/js/scripts/pages/app-ecommerce-details.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/forms/form-number-input.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/pages/frontend/app-tawaran.js') }}"></script>
    @if (
        (count($errors->all()) > 0 ||
            request()->route()->hasParameter('lelang')) &&
            $submited !== null)
        <script>
            $(function() {
                let modal = $('#modal-user');
                modal.modal('show');
            })
        </script>
    @endif
    @guest('frontend')
        <script>
            $(function() {
                let btn_add_new = $('.add-new');
                if (btn_add_new.length) {
                    btn_add_new.text("Masuk untuk berikan tawaran");
                    btn_add_new.removeAttr('data-bs-toggle')
                    btn_add_new.removeAttr('data-bs-target')
                }

            })
        </script>
    @else
        {{-- @if ($submited !== null)
            <script>
                $(function() {
                    let btn_add_new = $('.add-new');
                    if (btn_add_new.length) {
                        btn_add_new.text("Ubah tawaran");
                    }

                })
            </script>
        @endif --}}
    @endguest
@endpush
