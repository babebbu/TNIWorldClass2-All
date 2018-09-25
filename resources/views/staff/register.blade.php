@extends('layouts.minimal')

@section('title')
    TNI World Class #2 :: Staff Registration
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#register').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if(!checked) {
                    alert("เลือกฝ่ายสิครับ :D");
                    return false;
                }

            });
        });
    </script>
    <div class="container" style="display: table-cell; vertical-align: middle; padding-top: 20px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Join TNIWorldClass!</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ url('staff/register') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook Account</label>
                                <div class="col-md-6">
                                    <input  class="form-control"type="text" placeholder="57121072-3" value="{{ $facebook->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">รหัสนักศึกษา</label>
                                <div class="col-md-6">
                                    <input  class="form-control"type="text" name="student_id" placeholder="57121072-3" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ชื่อจริง</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="firstname" placeholder="ธนพล" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">นามสกุล</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="lastname" placeholder="หล่อดี" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ชื่อเล่น</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nickname" placeholder="พลซัง" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">อีเมล</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="email" placeholder="lo.thanapon_st@tni.ac.th" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">เบอร์มือถือ</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="mobile" placeholder="0801234567" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ฝ่ายงาน</label>
                                <div class="col-md-6">
                                    @foreach ($departments as $department)
                                        @if($department->id < 10)
                                            @continue
                                        @endif
                                        <div class="checkbox">
                                            <label>
                                                <input class="" type="checkbox" name="jobs[]" value="{{ $department->id }}"> {{ $department->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ขนาดเสื้อ</label>
                                <div class="col-md-6">
                                    <select name ="shirt_size" class="form-control" style="background: linear-gradient(#fcfcfc, #e9e9e9); max-width: 100px;" required>
                                        <option value ="S" > S </option>
                                        <option value ="M" > M </option>
                                        <option value ="L" > L </option>
                                        <option value ="XL" > XL </option>
                                        <option value ="XXL" > XXL </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">โรคประจำตัว</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="congenital_disease" rows="3" cols="40"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">อาหารที่แพ้</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="food_allergies" rows="3" cols="40"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="register">
                                        <i class="fa fa-btn fa-sign-in"></i>ร่วมทำค่าย
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection