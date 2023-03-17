{{-- @extends('layouts.vertical-menu-template.layout-full')
@extends('layouts.horizontal-menu-template.layout-full')

@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/tables/datatable/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/tables/datatable/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-validation.css') }}">
@endpush
@section('body')
@include('cms.components.header-1')
@include('cms.components.main-menu-1')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('frontend.components.footer')
@endsection

@push('page-vendor-js')
<script src="{{ asset('../app-assets/vendor/js/forms/select/select2.full.min.js') }}"></script>
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
<script src="{{ asset('../app-assets/vendor/js/forms/validation/jquery.validate.min.js') }}"></script>
@endpush --}}
@extends('layouts.horizontal-menu-template.layout-full')
@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/nouislider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendor/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/vendor/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
@endpush
@push('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/extensions/ext-component-sliders.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/plugins/form/form-validation.css') }}">
@endpush
@section('body')
    <!-- BEGIN: Header-->
    @include('cms.components.header-1')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('cms.components.main-menu-1')
    <!-- END: Main Menu-->

    @yield('content')
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('frontend.components.footer')
    <!-- END: Footer-->
@endsection
@push('page-vendor-js')
    <script src="{{ asset('../app-assets/vendor/js/forms/select/select2.full.min.js') }}"></script>
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
    <script src="{{ asset('../app-assets/vendor/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/wNumb.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('../app-assets/vendor/js/extensions/toastr.min.js') }}"></script>
@endpush
@push('page-js')
    <script src="{{ asset('../app-assets/js/scripts/pages/frontend/app-ecommerce.js') }}"></script>
@endpush
