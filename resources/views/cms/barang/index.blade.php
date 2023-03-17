@extends('cms.layouts.layout-with-list')
@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/pickers/pickdate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-file-uploader.css') }}">
@endpush
@push('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/form/pickers/pickadate/form-pickadate.css') }}">
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Search & Filter</h4>
                            <div class="row">
                                <div class="col-md-4 tanggal_barang"></div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">

                            <form id="form-delete" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>

                            <table class="user-list-table table">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>Foto Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Awal</th>
                                        <th>Deskripsi</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang_list as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="avatar-group">
                                                    @foreach ($item->images->take(3) as $image)
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="bottom" title="Billy Hopkins"
                                                            class="avatar pull-up">
                                                            <img src="{{ $image->url }}" alt="Avatar" width="33"
                                                                height="33" />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column ">
                                                    <a href="{{ route('view.barang', [
                                                        'barang' => $item
                                                    ]) }}" class="user_name text-truncate text-body">
                                                        <span class="fw-bolder">{{ $item->nama_barang }}</span>
                                                    </a>
                                                    <small class="emp_post text-muted">Tanggal:
                                                        {{ $item->tgl }}
                                                    </small>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-nowrap">Rp
                                                    {{ number_format($item->harga_awal, 0, '.', '.') }}</small>
                                            </td>
                                            <td>
                                                <small
                                                    class="text-nowrap">{{ Str::limit($item->deskripsi_barang, 80) }}</small>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-sm dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-vertical font-small-4">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('view.barang', ['barang' => $item]) }}"
                                                            class="dropdown-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-vertical font-small-4">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="5" r="1">
                                                                </circle>
                                                                <circle cx="12" cy="19" r="1">
                                                                </circle>
                                                            </svg>
                                                            Details
                                                        </a>
                                                        <a href="javascript:;"
                                                            onclick="
                                                            let form = document.getElementById('form-delete');
                                                            form.setAttribute('action', '{{ route('delete.barang.cms', ['barang' => $item]) }}');
                                                        form.submit();"
                                                            class="dropdown-item delete-record">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash-2 font-small-4 me-50">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17"></line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17"></line>
                                                            </svg>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal to add new user starts-->
                    @if (request()->route()->hasParameter('barang'))
                        @include('cms.barang.modal-edit')
                    @else
                        @include('cms.barang.modal-add')
                    @endif
                    <!-- Modal to add new user Ends-->
                </section>
                <!-- list and filter end -->
            </div>
            <!-- users list ends -->
        </div>
    </div>
@endsection
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/file-uploaders/dropzone.min.js') }}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('../app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/forms/multiple-file-uploader.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/pages/cms/app-barang-list.js') }}"></script>
    @if (request()->route()->hasParameter('barang'))
        <script>
            $(function() {
                let btn_add_new = $('.add-new');
                if (btn_add_new.length) {
                    btn_add_new.text("Kembali ke form pembaruan");
                }
            })
        </script>
    @endif
    @if (count($errors->all()) > 0 ||
            request()->route()->hasParameter('barang'))
        <script>
            $(function() {
                let modal = $('#modal-user');
                modal.modal('show')
            })
        </script>
    @endif
@endpush
