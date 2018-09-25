@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

        <!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Choose Department</h1>
        <h2 class="h5 text-white-op animated zoomIn">List all staffs in a specific department</h2>
    </div>
</div>
<!-- END Page Header -->

<div class="content text-center">
    <div class="block block-themed">
        <div class="block-header bg-primary-darker">
            <h3 class="block-title">เลือกฝ่าย</h3>
        </div>
        <div class="block-content" style="padding-bottom: 20px;">
            <select class="form-control" style="display: inline-block; width: auto;"
                    onchange="window.location.href = 'https://tniworldclass.com/admin/staffs/department/'+this.value;">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@endsection