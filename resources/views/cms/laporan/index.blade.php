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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
@endsection
@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/cms/app-laporan-list.js') }}"></script>
@endpush
