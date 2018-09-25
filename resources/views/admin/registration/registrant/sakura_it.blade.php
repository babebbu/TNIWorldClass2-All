@extends('admin.layouts.template')

@section('title', "Registrant Profile")
@section('content')
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <?php $i=0; ?>
            @foreach($registrants as $registrant)
                @if($i%4==0) <div class="row"> @endif
                    <div class="col-sm-3">
                        <!--<a class="block block-link-hover2" href="/admin/registrants/grade/">-->
                            <div class="block-content block-content-full text-center bg-image" style="background-image: url('{{ "https://sakuracamptni.com/10/profilepic/".$registrant->profile_picture }}');">
                                <div style="height: 260px"></div>
                            </div>
                            <div class="block block-content block-content-full text-center">
                                <div class="font-w600 push-5" style="color: {{ ($registrant->approved)? 'green' : 'red' }}">{{ $registrant->firstname }} ({{ $registrant->nickname }})</div>
                                <div class="text-muted">{{ $registrant->gpax }} ({{ $registrant->school_major }})</div>
                                <div class="text-muted">{{ $registrant->faculty }}</div>
                                <br>
                                <div class="text-muted">{{ $registrant->school_name }}</div>
                                <div class="text-muted">{{ $registrant->province_name }}</div>
                                <br>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-fadein-{{ $registrant->id }}" type="button">View Profile</button>
                            </div>
                        <!--</a>-->
                    </div>
                        <!-- Fade In Modal -->
                        <div class="modal fade" id="modal-fadein-{{ $registrant->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent remove-margin-b">
                                        <div class="block-header bg-primary-dark">
                                            <ul class="block-options">
                                                <li>
                                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Registrant Profile</h3>
                                        </div>
                                        <div class="block-content">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <form action="{{ URL::to("/admin/registrants/grade/update/$registrant->id") }}" method="post">
                                                            {{ csrf_field() }}
                                                            <img src="{{ "https://sakuracamptni.com/10/profilepic/".$registrant->profile_picture }}" style="max-width: 100%; margin-bottom: 30px;">
                                                            @if ($registrant->approved)
                                                                <input type="hidden" name="approved" value="0">
                                                                <button class="btn btn-block btn-danger push-10" type="submit">
                                                                    <i class="fa fa-times pull-left"></i> Click here to Deny
                                                                </button>
                                                            @else
                                                                <input type="hidden" name="approved" value="1">
                                                                <button class="btn btn-block btn-success push-10" type="submit">
                                                                    <i class="fa fa-check pull-left"></i> Click here to Approve
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Title</label>
                                                                    <input class="form-control" placeholder="Title" value="{{ $registrant->title }}" disabled>
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
                                                                    <input class="form-control" placeholder="Lastname" value="{{ $registrant->lastname }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>Nickname</label>
                                                                    <input class="form-control" placeholder="Nickname" value="{{ $registrant->nickname }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW-->
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>School</label>
                                                                    <input class="form-control" placeholder="School" value="{{ $registrant->school_name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Province</label>
                                                                    <input class="form-control" placeholder="Province" value="{{ $registrant->province_name }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Studying Major</label>
                                                                    <input class="form-control" placeholder="Major" value="{{ $registrant->school_major }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label>GPAX</label>
                                                                    <input class="form-control" placeholder="GPAX" value="{{ $registrant->gpax }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW-->
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <input class="form-control" placeholder="Status" value="Sakura" disabled>
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
                                                                    <input class="form-control" placeholder="Facebook" value="{{ $registrant->facebook }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW -->
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label>ทำไมอยากมาค่ายซากุระ</label>
                                                                <textarea class="form-control" style="height: 110px;" disabled>{{ $registrant->q1 }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW -->
                                                        <br>
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label>1. ถ้าหากโจรจับตัวประกัน 2 คน ระหว่างคนแก้กับเด็ก หากเลือกช่วยได้ 1 คน จะเลือกช่วยใคร และมีวิธีการช่วยเหลืออย่างไร เพราะอะไร</label>
                                                                <textarea class="form-control" style="height: 110px;" disabled>{{ $registrant->a1 }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW -->
                                                        <br>
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label>2. ในหมู่บ้านที่น้องอาศัยอยู่มีกลุ่มโจรปล้นวัวของชาวบ้าน  ในฐานะที่น้องเป็นคาวบอย  น้องจะมีวิธีแก้ปัญหาและป้องกันอย่างไร เพื่อไม่ให้เกิดเหตุการณ์นี้ขึ้นอีก</label>
                                                                <textarea class="form-control" style="height: 110px;" disabled>{{ $registrant->a2 }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW -->
                                                        <br>
                                                        <!-- BEGIN ROW -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label>3. ถ้าน้องได้รับเลือกเป็นนายอำเภอของหมู่บ้านเป็นเวลา 2 วัน น้องจะทำอย่างไรเพื่อให้เกิดประโยชน์แก่คนในหมู่บ้าน</label>
                                                                <textarea class="form-control" style="height: 110px;" disabled>{{ $registrant->a3 }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- END ROW -->
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Fade In Modal -->
                    @if($i++%4==3) </div> @endif
            @endforeach
        </div>
    </div>



@endsection