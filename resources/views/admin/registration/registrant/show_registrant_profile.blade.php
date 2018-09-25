@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')

<!-- Page Header -->
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                {{ $registrant->nickname }}<br><small>{{ $registrant->firstname }} {{ $registrant->lastname }}</small>
            </h1>
        </div>
        <div class="col-sm-5 text-right hidden-xs">
            <div class="breadcrumb push-10-t" style="text-transform: capitalize;">
                {{ $registrant->first }}<br>
                <span style="font-weight: normal">
                    {{ $registrant->second }}<br>
                {{ $registrant->third }}
            </div>
        </div>
    </div>
</div>
<!-- END Page Header -->
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <img src="{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}" style="max-width: 100%; margin-bottom: 30px;">
        </div>
        <div class="col-lg-8">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">General Information</h3>
                </div>
                <div class="block-content">
                    <!-- BEGIN ROW -->
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" placeholder="Firstname" value="@if($registrant->gender == 'M') นาย @else นางสาว @endif" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->firstname }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->lastname }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Nickname</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->nickname }}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW-->
                    <!-- BEGIN ROW -->
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>School</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->school_name }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Studying Major</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->school_major }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>GPAX</label>
                                <input class="form-control" placeholder="Firstname" value="{{ $registrant->gpax }}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW-->
                    <!-- BEGIN ROW -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control" placeholder="Status" value="{{ ($registrant->lock_worldclass) ? 'Locked' : ' Pending' }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" placeholder="Phone" value="{{ $registrant->phone }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input class="form-control" placeholder="Status" value="{{ $registrant->name }}" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- END ROW -->
                </div>
            </div>

            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Contact Information</h3>
                </div>
                <div class="block-content">

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
</div>

@endsection