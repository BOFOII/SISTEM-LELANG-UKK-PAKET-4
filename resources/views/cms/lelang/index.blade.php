@extends('cms.layouts.layout-with-list')
@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/pickers/pickdate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/file-uploaders/dropzone.min.css') }}">
@endpush
@push('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/form/pickers/pickadate/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-file-uploader.css') }}">
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
                                <div class="col-md-4 tgl_lelang"></div>
                                <div class="col-md-4 pemenang"></div>
                                <div class="col-md-4 lelang_status"></div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <form id="form-buka" method="POST">
                                @method('PATCH')
                                @csrf
                            </form>

                            <form id="form-tutup" method="POST">
                                @method('PATCH')
                                @csrf
                            </form>

                            <form id="form-delete" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>

                            <table class="user-list-table table">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>Tanggal</th>
                                        <th>Barang</th>
                                        <th>Petugas</th>
                                        <th>Pemenang</th>
                                        <th>Harga Akhir</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lelang_list as $item)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <small class="text-nowrap">{{ $item->tgl_lelang }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar-group">
                                                            @foreach ($item->barang->images->take(3) as $image)
                                                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-bs-placement="bottom" title="Billy Hopkins"
                                                                    class="avatar pull-up">
                                                                    <img src="{{ $image->url }}" alt="Avatar"
                                                                        width="33" height="33" />
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('view.barang', [
                                                            'barang' => $item->barang
                                                        ]) }}" class="user_name text-truncate text-body">
                                                            <span class="fw-bolder">{{ $item->barang->nama_barang }}</span>
                                                        </a>
                                                        <small
                                                            class="emp_post text-muted">{{ Str::limit($item->barang->deskripsi_barang) }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar colorClass me-1">
                                                            <img src="" alt="Avatar" height="32"
                                                                width="32">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('view.petugas.cms', [
                                                            'petugas' => $item->petugas
                                                        ]) }}" class="user_name text-truncate text-body">
                                                            <span
                                                                class="fw-bolder">{{ $item->petugas->nama_petugas }}</span>
                                                        </a>
                                                        <small class="emp_post text-muted">Username:
                                                            {{ $item->petugas->username }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            @if ($item->winner == null)
                                                <td>
                                                    <small class="text-nowrap">Belum Ada Pemenang</small>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar colorClass me-1">
                                                                <img src="" alt="Avatar" height="32"
                                                                    width="32">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="" class="user_name text-truncate text-body">
                                                                <span
                                                                    class="fw-bolder">{{ $item->winner->nama_lengkap }}</span>
                                                            </a>
                                                            <small class="emp_post text-muted">Username:
                                                                {{ $item->winner->username }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif

                                            <td>
                                                @if ($item->harga_akhir == null)
                                                    <small class="text-nowrap">Belum Ada Harga Akhir</small>
                                                @else
                                                    <small class="text-nowrap">{{ $item->harga_akhir }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-nowrap">{{ ucfirst($item->status) }}</small>
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
                                                            <circle cx="12" cy="5" r="1">
                                                            </circle>
                                                            <circle cx="12" cy="19" r="1">
                                                            </circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('view.lelang.cms', [
                                                            'lelang' => $item
                                                        ]) }}"
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
                                                        @if ($item->status == 'ditutup')
                                                            <a href="javascript:;"
                                                                onclick="
                                                                    let form = document.getElementById('form-buka');
                                                                    form.setAttribute('action', '{{ route('patch.lelang.open', [
                                                                        'lelang' => $item,
                                                                    ]) }}');
                                                                    form.submit();
                                                                "
                                                                class="dropdown-item">
                                                                <i data-feather='play'></i>
                                                                Buka
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="
                                                                    let form = document.getElementById('form-tutup');
                                                                    form.setAttribute('action', '{{ route('patch.lelang.close', [
                                                                        'lelang' => $item,
                                                                    ]) }}');
                                                                    form.submit();
                                                                "
                                                                class="dropdown-item">
                                                                <i data-feather='power'></i>
                                                                Tutup
                                                            </a>
                                                        @endif
                                                        <a href="javascript:;"
                                                            onclick="
                                                                    let form = document.getElementById('form-delete');
                                                                    form.setAttribute('action', '{{ route('delete.lelang.cms', [
                                                                        'lelang' => $item
                                                                    ]) }}');
                                                                    form.submit();
                                                        "
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
                        <!-- Modal to add new user starts-->
                        @if (request()->route()->hasParameter('lelang'))
                            @include('cms.lelang.modal-edit')
                        @else
                            @include('cms.lelang.modal-add')
                        @endif
                        <!-- Modal to add new user Ends-->
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
@endsection
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/pickers/pickadate/legacy.js') }}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/cms/app-lelang-list.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
   
    @if (count($errors->all()) > 0 || request()->route()->hasParameter('lelang'))
          <script>
              $(function() {
                  let modal = $('#modal-user');
                  modal.modal('show')
              })
          </script>
    @endif

    @if (request()->route()->hasParameter('lelang'))
    <script>
        $(function() {
            let btn_add_new = $('.add-new');
            if (btn_add_new.length) {
                btn_add_new.text("Kembali ke form pembaruan");
            }
        })
    </script>
@endif
@endpush
