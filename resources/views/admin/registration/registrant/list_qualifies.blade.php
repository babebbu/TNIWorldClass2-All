@extends('admin.layouts.template')

@section('title', 'Dashboard')
@section('content')

<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">Qualifies</h1>
        <h2 class="h5 text-white-op animated zoomIn">น้องๆผู้น่ารักและแข็งแกร่ง </h2>
    </div>
</div>
<!-- END Page Header -->

<div class="content">

    <!--<div class="block block-themed">
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
    </div>-->

    <!-- Partial Table -->
    <div class="block block-themed" id="it">
        <div class="block-header bg-primary-darker">
            <h3 class="block-title">Information Technology</h3>
        </div>
        <table class="table table-striped table-vcenter table-bordered">
            <thead>
            <tr>
                <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                <th>Name</th>
                <th class="text-center">Nickname</th>
                <th class="text-center">Status</th>
                <th class="hidden-xs">Phone</th>
                <th class="hidden-xs hidden-sm">School</th>
                <th class="hidden-xs">Interested Major</th>
                <th class="text-center" style="width: 180px;">Confirm Status</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            @foreach($qualifies['IT'] as $qualified)
                <tr class="registrant-row">
                    <td class="text-center">
                        <a href="{{ URL::to("/admin/registrants/$qualified->id") }}"><img class="img-avatar" src="{{ URL::to("/admin/registrants/profilepic/$qualified->profile_picture") }}" alt=""></a>
                    </td>
                    <td class="">(IT-<?php echo $i; ?>) {{ $qualified->firstname }} {{ $qualified->lastname }}</td>
                    <td class="font-w600 text-center">{{ $qualified->nickname }}</td>
                    <td class="text-center">{!! ($qualified->type == 'ตัวจริง')? "<span style='color: green'>$qualified->type</span>" : "<span style='color: red'>$qualified->type</span>"  !!}</td>
                    <td class="hidden-xs">{{ $qualified->phone }}</td>
                    <td class="hidden-xs" style="max-width: 160px;">
                        <b>{{ $qualified->school_name }}</b>
                        <ul style="padding-left: 22px; margin-bottom: 0;">
                            <li>{{ $qualified->school_major }}</li>
                            <li>{{ $qualified->gpax }}</li>
                        </ul>
                    </td>
                    <td>
                        <ol style="padding-left: 22px; margin-bottom: 0;">
                            <span style="margin-left: -15px;"><b>{{ $qualified->faculty }}</b></span>
                            <small><li>{{ $qualified->first }}</li></small>
                            <small><li>{{ $qualified->second }}</li></small>
                            <small><li>{{ $qualified->third }}</li></small>
                        </ol>
                    </td>
                    <td class="text-center">
                        <span id="confirm-status-{{ $qualified->id }}">{{ $qualified->confirm }}</span><br>
                        <div class="btn-group">
                            <button class="btn btn-success" type="button" onclick="confirmCheck({{ $qualified->id }}, 'ดีใจจัง! น้องมา')" value="{{ $qualified->id }}"><span class="fa fa-check"></span></button>
                            <button class="btn btn-primary" type="button" onclick="confirmCheck({{ $qualified->id }}, 'รอคอนเฟิร์ม')" value="{{ $qualified->id }}"><span class="fa fa-phone"></span></button>
                            <button class="btn btn-danger" type="button" onclick="confirmCheck({{ $qualified->id }}, 'บาย')" value="{{ $qualified->id }}"><span class="fa fa-times"></span></button>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
            </tbody>
        </table>
        <!-- END Partial Table -->
    </div>

        <!-- Partial Table -->
        <div class="block block-themed" id="eng">
            <div class="block-header bg-primary-darker">
                <h3 class="block-title">Engineering</h3>
            </div>
            <table class="table table-striped table-vcenter table-bordered">
                <thead>
                <tr>
                    <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                    <th>Name</th>
                    <th class="text-center">Nickname</th>
                    <th class="text-center">Status</th>
                    <th class="hidden-xs">Phone</th>
                    <th class="hidden-xs hidden-sm">School</th>
                    <th class="hidden-xs">Interested Major</th>
                    <th class="text-center" style="width: 180px;">Confirm Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($qualifies['ENG'] as $qualified)
                    <tr class="registrant-row">
                        <td class="text-center">
                            <a href="{{ URL::to("/admin/registrants/$qualified->id") }}"><img class="img-avatar" src="{{ URL::to("/admin/registrants/profilepic/$qualified->profile_picture") }}" alt=""></a>
                        </td>
                        <td class="">(ENG-<?php echo $i; ?>) {{ $qualified->firstname }} {{ $qualified->lastname }}</td>
                        <td class="font-w600 text-center">{{ $qualified->nickname }}</td>
                        <td class="text-center">{!! ($qualified->type == 'ตัวจริง')? "<span style='color: green'>$qualified->type</span>" : "<span style='color: red'>$qualified->type</span>"  !!}</td>
                        <td class="hidden-xs">{{ $qualified->phone }}</td>
                        <td class="hidden-xs" style="max-width: 160px;">
                            <b>{{ $qualified->school_name }}</b>
                            <ul style="padding-left: 22px; margin-bottom: 0;">
                                <li>{{ $qualified->school_major }}</li>
                                <li>{{ $qualified->gpax }}</li>
                            </ul>
                        </td>
                        <td>
                            <ol style="padding-left: 22px; margin-bottom: 0;">
                                <span style="margin-left: -15px;"><b>{{ $qualified->faculty }}</b></span>
                                <small><li>{{ $qualified->first }}</li></small>
                                <small><li>{{ $qualified->second }}</li></small>
                                <small><li>{{ $qualified->third }}</li></small>
                            </ol>
                        </td>
                        <td class="text-center">
                            <span id="confirm-status-{{ $qualified->id }}">{{ $qualified->confirm }}</span><br>
                            <div class="btn-group">
                                <button class="btn btn-success" type="button" onclick="confirmCheck({{ $qualified->id }}, 'ดีใจจัง! น้องมา')" value="{{ $qualified->id }}"><span class="fa fa-check"></span></button>
                                <button class="btn btn-primary" type="button" onclick="confirmCheck({{ $qualified->id }}, 'รอคอนเฟิร์ม')" value="{{ $qualified->id }}"><span class="fa fa-phone"></span></button>
                                <button class="btn btn-danger" type="button" onclick="confirmCheck({{ $qualified->id }}, 'บาย')" value="{{ $qualified->id }}"><span class="fa fa-times"></span></button>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <!-- END Partial Table -->
        </div>

            <!-- Partial Table -->
            <div class="block block-themed" id="ba">
                <div class="block-header bg-primary-darker">
                    <h3 class="block-title">Business Administration</h3>
                </div>
                <table class="table table-striped table-vcenter table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 120px;"><i class="si si-user"></i></th>
                        <th>Name</th>
                        <th class="text-center">Nickname</th>
                        <th class="text-center">Status</th>
                        <th class="hidden-xs">Phone</th>
                        <th class="hidden-xs hidden-sm">School</th>
                        <th class="hidden-xs">Interested Major</th>
                        <th class="text-center" style="width: 180px;">Confirm Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($qualifies['BA'] as $qualified)
                        <tr class="registrant-row">
                            <td class="text-center">
                                <a href="{{ URL::to("/admin/registrants/$qualified->id") }}"><img class="img-avatar" src="{{ URL::to("/admin/registrants/profilepic/$qualified->profile_picture") }}" alt=""></a>
                            </td>
                            <td class="">(BA-<?php echo $i; ?>) {{ $qualified->firstname }} {{ $qualified->lastname }}</td>
                            <td class="font-w600 text-center">{{ $qualified->nickname }}</td>
                            <td class="text-center">{!! ($qualified->type == 'ตัวจริง')? "<span style='color: green'>$qualified->type</span>" : "<span style='color: red'>$qualified->type</span>"  !!}</td>
                            <td class="hidden-xs">{{ $qualified->phone }}</td>
                            <td class="hidden-xs" style="max-width: 160px;">
                                <b>{{ $qualified->school_name }}</b>
                                <ul style="padding-left: 22px; margin-bottom: 0;">
                                    <li>{{ $qualified->school_major }}</li>
                                    <li>{{ $qualified->gpax }}</li>
                                </ul>
                            </td>
                            <td>
                                <ol style="padding-left: 22px; margin-bottom: 0;">
                                    <span style="margin-left: -15px;"><b>{{ $qualified->faculty }}</b></span>
                                    <small><li>{{ $qualified->first }}</li></small>
                                    <small><li>{{ $qualified->second }}</li></small>
                                    <small><li>{{ $qualified->third }}</li></small>
                                </ol>
                            </td>
                            <td class="text-center">
                                <span id="confirm-status-{{ $qualified->id }}">{{ $qualified->confirm }}</span><br>
                                <div class="btn-group">
                                    <button class="btn btn-success" type="button" onclick="confirmCheck({{ $qualified->id }}, 'ดีใจจัง! น้องมา')" value="{{ $qualified->id }}"><span class="fa fa-check"></span></button>
                                    <button class="btn btn-primary" type="button" onclick="confirmCheck({{ $qualified->id }}, 'รอคอนเฟิร์ม')" value="{{ $qualified->id }}"><span class="fa fa-phone"></span></button>
                                    <button class="btn btn-danger" type="button" onclick="confirmCheck({{ $qualified->id }}, 'บาย')" value="{{ $qualified->id }}"><span class="fa fa-times"></span></button>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
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

            /*$('tr.registrant-row').click( function() {
                window.location = $(this).find('a').attr('href');
            }).hover( function() {
                $(this).toggleClass('hover');
            });*/


            function confirmCheck(id, status){
                var jsonData = {'confirmStatus' : status, '_token': '{{ csrf_token() }}'}
                $.ajax({
                    type: "POST",
                    url: "https://tniworldclass.com/admin/qualifies/confirm/"+id,
                    dataType: "json",
                    data: jsonData,
                    success: function(result){
                        $('#confirm-status-'+result[0].id).html(result[0].confirm);
                    },
                    error: function(){
                        alert('fail');
                    }
                });
            }

        </script>
@endsection