@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Staffs</h1>
        <h2 class="h5 text-white-op animated zoomIn">List of staffs</h2>
    </div>
</div>
<!-- END Page Header -->

<div class="content">
<!-- Partial Table -->
<div class="block">
    <table class="table table-striped table-vcenter table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                <th>Name</th>
                <th class="text-center">Nickname</th>
                <th>Phone</th>
                <!--<th class="hidden-xs">Email</th>-->
                <th class="hidden-xs hidden-sm text-center">Shirt</th>
                <th class="hidden-xs">Departments</th>
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
                <td class="">{{ $staff->firstname }} {{ $staff->lastname }}</td>
                <td class="font-w600 text-center">{{ $staff->nickname }}</td>
                <td class="">{{ $staff->mobile }}</td>
                <!--<td class="hidden-xs">{{ $staff->email }}</td>-->
                <td class="hidden-xs text-center">{{ $staff->shirt_size }}</td>
                <td>
                    <ul style="padding-left: 15px; margin-bottom: 0;">
                        @foreach($jobs as $job)
                            @foreach($departments as $department)
                                @if($job->student_id == $staff->student_id && $job->dept_id == $department->id)
                                    <li>{{ $department->name }}</li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </td>
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