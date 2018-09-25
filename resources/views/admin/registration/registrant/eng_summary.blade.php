@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')

        <!-- Page Header -->
<div class="content bg-image overflow-hidden" style="background-image: url('/assets/images/photos/wc2.jpg'); background-position: top;">
    <div class="push-50-t push-15 header-text-shadow">
        <h1 class="h2 text-white animated zoomIn">ENG Summary ({{ count($registrants) }})</h1>
        <h2 class="h5 text-white-op animated zoomIn">List of all ENG registrant from TNI World Class</h2>
    </div>
</div>
<!-- END Page Header -->
<!-- END Stats -->

<div class="content">
    <div class="row items-push">
        <div class="col-lg-12">
            <div class="block block-themed">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">ENG Registrants</h3>
                </div>
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th style="width: 150px;">Full Name</th>
                        <th class="text-center">Score</th>
                        <th>School</th>
                        <th class="hidden-xs" style="width: 15%;">Major</th>
                        <th class="" style="">Province</th>
                        <th class="text-center" style="width: 100px;">สถานะ</th>
                        <th class="text-center" style="width: 220px;">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registrants as $registrant)
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
                            <td class="text-center">{{ $registrant->score }}</td>
                            <td>{{ $registrant->school_name }}</td>
                            <td>{{ $registrant->school_major }}</td>
                            <td class="">{{ $registrant->province_name }}</td>
                            <td class="text-center">{!! ($registrant->qualified)? ($registrant->qualified == 1)? "<span style='color: green'>โจรสลัด<br>(ตัวจริง)</span>":"<span style='color: orange'>โจรกระจอก<br>(ตัวสำรอง)</span>" : "<span style='color: red'>หงอยแดก</span>" !!}</td>
                            <td>
                                <form action="/admin/registrants/eng/set-qualify/{{ $registrant->id }}" method="post">
                                    {{ csrf_field() }}
                                    @if ($registrant->qualified == 1)
                                        <button name="qualify" class="btn btn-block btn-info push-10" type="submit" value="2">
                                            <i class="fa fa-check pull-left"></i> โจรกระจอก (ตัวสำรอง)
                                        </button>
                                        <button name="qualify" class="btn btn-block btn-danger push-10" type="submit" value="0">
                                            <i class="fa fa-times pull-left"></i> หงอยแดกไป
                                        </button>
                                    @elseif($registrant->qualified == 2)
                                        <button name="qualify" class="btn btn-block btn-success push-10" type="submit" value="1">
                                            <i class="fa fa-check pull-left"></i> โจรสลัด (ตัวจริง)
                                        </button>
                                        <button  name="qualify"class="btn btn-block btn-danger push-10" type="submit" value="0">
                                            <i class="fa fa-times pull-left"></i> ยกเลิก
                                        </button>
                                    @else
                                        <button name="qualify" class="btn btn-block btn-success push-10" type="submit" value="1">
                                            <i class="fa fa-check pull-left"></i> โจรสลัด (ตัวจริง)
                                        </button>
                                        <button name="qualify" class="btn btn-block btn-info push-10" type="submit" value="2">
                                            <i class="fa fa-check pull-left"></i> โจรกระจอก (ตัวสำรอง)
                                        </button>
                                    @endif
                                </form>
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