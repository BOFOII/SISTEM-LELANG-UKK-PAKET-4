@extends('layouts.horizontal-menu-template.base')
@section('body_class')
    horizontal-layout horizontal-menu blank-page navbar-floating footer-static
@endsection
@section('body_data_col')
    blank-page
@endsection
@section('body')
  @yield('content')
@endsection