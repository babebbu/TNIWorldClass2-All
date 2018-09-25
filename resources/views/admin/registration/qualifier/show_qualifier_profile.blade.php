@extends('admin.layouts.template')

@section('title', "Qualifier' Profile")
@section('content')

        <!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Welcome Back</h1>
        <h2 class="h5 text-white-op animated zoomIn">{{ Auth::guard('admin')->user()->firstname }} {{ Auth::guard('admin')->user()->lastname }}</h2>
    </div>
</div>
<!-- END Page Header -->

@endsection