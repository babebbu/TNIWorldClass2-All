@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')

<!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">IT Summary</h1>
        <h2 class="h5 text-white-op animated zoomIn">List of all IT registrant from TNI World Class and Sakura Camp</h2>
    </div>
</div>
<!-- END Page Header -->


<!-- Stats -->
<div class="content bg-white border-b">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">Total Registrants</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">{{ count($registrants['confirmed'])+count($registrants['unconfirmed'])+$registrants['countSakuraApproved']+count($registrants['sakura'])+7 }}</a>
        </div>
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">TWC: Confirmed</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">{{ count($registrants['confirmed']) }}</a>
        </div>
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">TWC: No Answer</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">{{ count($registrants['unconfirmed']) }}</a>
        </div>
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">Sakura (Good)</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">{{ $registrants['countSakuraApproved'] }}</a>
        </div>
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">Sakura (Fair)</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">{{ count($registrants['sakura']) }}</a>
        </div>
        <div class="col-xs-6 col-sm-2">
            <div class="font-w700 text-gray-darker animated fadeIn">Direct Admission</div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#">7</a>
        </div>
    </div>
</div>
<!-- END Stats -->

<div class="content">
    <div class="row items-push">
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Confirmed Registrants ({{ count($registrants['confirmed']) }})</h3>
                </div>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th style="width: 150px;">Full Name</th>
                            <th class="text-center">Score</th>
                            <th>School</th>
                            <th class="hidden-xs" style="width: 15%;">Major</th>
                            <th class="" style="width: 100px;">Province</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrants['confirmed'] as $registrant)
                        <tr class="registrant-row">
                            <td class="text-center">
                                <a href="/admin/registrants/grade/faculty/{{ $registrant->id }}">
                                    <div class="block-content block-content-full text-center bg-image" style="
                                            background-image: url('{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}');
                                            border-radius: 50%;
                                            ">

                                    </div>
                                </a>
                            </td>
                            <td>{{ $registrant->firstname }} ({{ $registrant->nickname }})</td>
                            <td class="text-center">{{ $registrant->totalScore }}</td>
                            <td>{{ $registrant->school_name }}</td>
                            <td>{{ $registrant->school_major }}</td>
                            <td class="">
                                {{ $registrant->province_name }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">No Answers Registrants ({{ count($registrants['unconfirmed']) }})</h3>
                </div>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th style="width: 150px;">Full Name</th>
                        <th class="text-center">Score</th>
                        <th>School</th>
                        <th class="hidden-xs" style="width: 15%;">Major</th>
                        <th class="" style="width: 100px;">Province</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrants['unconfirmed'] as $registrant)
                        <tr>
                            <td class="text-center">
                                <div class="block-content block-content-full text-center bg-image" style="
                                        background-image: url('{{ URL::to("/admin/registrants/profilepic/$registrant->profile_picture") }}');
                                        border-radius: 50%;
                                        ">

                                </div>
                            </td>
                            <td>{{ $registrant->firstname }} ({{ $registrant->nickname }})</td>
                            <td class="text-center">0</td>
                            <td>{{ $registrant->school_name }}</td>
                            <td>{{ $registrant->school_major }}</td>
                            <td class="">
                                {{ $registrant->province_name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Sakura ({{ $registrants['countSakuraApproved'] }})</h3>
                </div>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th style="width: 150px;">Full Name</th>
                        <th>Phone</th>
                        <th>School</th>
                        <th class="hidden-xs" style="width: 15%;">Major</th>
                        <th class="" style="width: 100px;">Province</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrants['sakuraApproved'] as $registrant)
                        <tr>
                            <td class="text-center">
                                <div class="block-content block-content-full text-center bg-image" style="
                                        background-image: url('{{ "https://sakuracamptni.com/10/profilepic/".$registrant->profile_picture }}');
                                        border-radius: 50%;
                                        ">

                                </div>
                            </td>
                            <td>{{ $registrant->firstname }} ({{ $registrant->nickname }})</td>
                            <td><span style='color: green'>{{ $registrant->phone }}</span></td>
                            <td>{{ $registrant->school_name }}</td>
                            <td>{{ $registrant->school_major }}</td>
                            <td class="">
                                {{ $registrant->province_name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Sakura ({{ count($registrants['sakura']) }})</h3>
                </div>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th style="width: 150px;">Full Name</th>
                        <th>Phone</th>
                        <th>School</th>
                        <th class="hidden-xs" style="width: 15%;">Major</th>
                        <th class="" style="width: 100px;">Province</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrants['sakura'] as $registrant)
                        <tr>
                            <td class="text-center">
                                <div class="block-content block-content-full text-center bg-image" style="
                                        background-image: url('{{ "https://sakuracamptni.com/10/profilepic/".$registrant->profile_picture }}');
                                        border-radius: 50%;
                                        ">

                                </div>
                            </td>
                            <td>{{ $registrant->firstname }} ({{ $registrant->nickname }})</td>
                            <td><span style='color: red'>{{ $registrant->phone }}</span></td>
                            <td>{{ $registrant->school_name }}</td>
                            <td>{{ $registrant->school_major }}</td>
                            <td class="">
                                {{ $registrant->province_name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection