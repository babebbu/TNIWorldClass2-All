@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

        <!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Registrants ({{ count($registrants) }})</h1>
        <h2 class="h5 text-white-op animated zoomIn">น้องๆผู้น่ารัก </h2>
    </div>
</div>
<!-- END Page Header -->

<div class="content">

    <div class="block block-themed">
        <div class="block-header bg-primary-darker">
            <h3 class="block-title">Advance Options</h3>
        </div>
        <div class="block-content" style="padding-bottom: 20px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <select class="form-control" style="display: inline-block; width: 100%;">
                            <option>-- View Option --</option>
                            <option>Table View</option>
                            <option>Card View</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" style="display: inline-block; width: 100%;">
                            <option>-- Limit --</option>
                            <option>20</option>
                            <option>40</option>
                        </select>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2 text-right">
                        <input class="form-control" placeholder="Search..." style="display: inline-block; width: 240px;">
                        <button class="btn btn-default" type="button" style="margin-top: -2px;">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
            </div>
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
                <th>Status</th>
                <th class="hidden-xs">Phone</th>
                <th class="hidden-xs hidden-sm">School</th>
                <th class="hidden-xs">Interested Major</th>
                <th class="text-center" style="width: 100px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registrants as $registrant)
                <tr class="registrant-row">
                    <td class="text-center">
                        <a href="{{ URL::to("/admin/registrants/$registrant->id") }}"><img class="img-avatar" src="{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}" alt=""></a>
                    </td>
                    <td class="">{{ $registrant->fullname }}</td>
                    <td class="font-w600 text-center">{{ $registrant->nickname }}</td>
                    <td class=""><?php echo ($registrant->lock_worldclass)? "<span style='color: green;'>Locked</span>" : "<span style='color: red;'>Pending</span>"; ?></td>
                    <td class="hidden-xs">{{ $registrant->phone }}</td>
                    <td class="hidden-xs text-center" style="max-width: 160px;">{{ $registrant->school_name }}</td>
                    <td>
                        <ol style="padding-left: 22px; margin-bottom: 0;">
                            <small><li><b>{{ $registrant->first }}</b></li></small>
                            <small><li>{{ $registrant->second }}</li></small>
                            <small><li>{{ $registrant->third }}</li></small>
                        </ol>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ URL::to("/admin/registrants/$registrant->id/edit") }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Staff"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Staff"><i class="fa fa-times"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- END Partial Table -->
    </div>

    <style tyoe="text/css">
        tr.hover {
            cursor: pointer;
        }
    </style>

@endsection

@section('page-script')
<script type="text/javascript">
    $('tr.registrant-row').click( function() {
        window.location = $(this).find('a').attr('href');
    }).hover( function() {
        $(this).toggleClass('hover');
    });
</script>
@endsection