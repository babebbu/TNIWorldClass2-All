@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Staffs ({{ $currentDepartment->name }})</h1>
        <h2 class="h5 text-white-op animated zoomIn">List of staffs</h2>
    </div>
</div>
<!-- END Page Header -->

<div class="content">


    <div class="row" style="margin-bottom: 15px;">
        <div class="col-sm-5"><label>เลือกฝ่าย</label>
            <select class="form-control" style="display: inline-block; width: auto;"
                    onchange="window.location.href = 'https://tniworldclass.com/admin/staffs/department/'+this.value;">
            @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($department->id == $currentDepartment->id) selected @endif>{{ $department->name }}</option>
            @endforeach
            </select>
        </div>
    </div>

    <!-- Partial Table -->
    <div class="block">
        <table class="table table-striped table-vcenter table-bordered">
            <thead>
            <tr>
                <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                <th>Name</th>
                <th class="text-center">Nickname</th>
                <th>Phone</th>
                <th class="text-center">Shirt</th>
                <th class="">โรคประจำตัว</th>
                <th class="">อาหารที่แพ้</th>
                <!--<th class="text-center" style="width: 100px;">Actions</th>-->
            </tr>
            </thead>
            <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td class="text-center">
                        <img class="img-avatar img-avatar48" src="{{ $staff->avatar }}" alt="">
                    </td>
                    <td class="" style="min-width: 180px">{{ $staff->firstname }} {{ $staff->lastname }}</td>
                    <td class="font-w600 text-center">{{ $staff->nickname }}</td>
                    <td class="">{{ $staff->mobile }}</td>
                    <td class="hidden-xs text-center">{{ $staff->shirt_size }}</td>
                    <td>{{ $staff->congenital_disease }}</td>
                    <td>{{ $staff->food_allergies }}</td>
                    <!--<td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Staff"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Staff"><i class="fa fa-times"></i></button>
                        </div>
                    </td>-->
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- END Partial Table -->
    </div>

@endsection