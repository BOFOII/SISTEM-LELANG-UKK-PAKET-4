@extends('cms.layouts.layout-with-list')
@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/file-uploaders/dropzone.min.css') }}">
@endpush
@push('page-css')
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
                                <div class="col-md-4 user_role"></div>
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
                                        <td></td>
                                        <th>Personal Info</th>
                                        <th>Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($petugas_list as $user)
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar colorClass me-1">
                                                            <img src="{{ $user->avatar == null ? '../../../app-assets/images/portrait/small/avatar-s-11.jpg' : $user->avatar->url }}"
                                                                alt="Avatar" height="32" width="32">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="" class="user_name text-truncate text-body">
                                                            <span class="fw-bolder">{{ $user->nama_petugas }}</span>
                                                        </a>
                                                        <small class="emp_post text-muted">Username:
                                                            {{ $user->username }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($user->level->level == 'petugas')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-slack font-medium-3 text-danger me-50">
                                                        <path
                                                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z">
                                                        </path>
                                                        <path
                                                            d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z">
                                                        </path>
                                                        <path
                                                            d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z">
                                                        </path>
                                                        <path
                                                            d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z">
                                                        </path>
                                                        <path
                                                            d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z">
                                                        </path>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 font-medium-3 text-info me-50">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                @endif

                                                <small class="text-nowrap">{{ ucfirst($user->level->level) }}</small>
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
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('view.petugas.cms', [
                                                            'petugas' => $user
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
                                                        <a href="javascript:;"
                                                            onclick="
                                                              let form = document.getElementById('form-delete');
                                                              form.setAttribute('action', '{{ route('delete.petugas.cms', [
                                                                'petugas' => $user
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
                                                                    y2="17">
                                                                </line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17">
                                                                </line>
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
                        @if (request()->route()->hasParameter('petugas'))
                            @include('cms.petugas.modal-edit')
                        @else
                            @include('cms.petugas.modal-add')
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
    <script src="{{ asset('../app-assets/vendor/js/file-uploaders/dropzone.min.js') }}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('../app-assets/js/scripts/pages/cms/app-petugas-list.js') }}"></script>
    <script src="{{ asset('../app-assets/js/scripts/forms/single-file-uploader.js') }}"></script>
    @if (request()->route()->hasParameter('petugas'))
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
            request()->route()->hasParameter('petugas'))
        <script>
            $(function() {
                let modal = $('#modal-user');
                modal.modal('show')
            })
        </script>
    @endif
@endpush