@extends('layouts.minimal')

@section('title')
    TNI World Class #2 :: Staff Profile
@endsection

@section('content')
<script>
function toggleedit()
{
 var x = document.getElementsByTagName("input");
for(var i = 1 ; i<x.length;i++)
{
        x[i].disabled = false;
}
document.getElementById("congenital_disease").disabled = false;
document.getElementById("food_allergies").disabled = false;
var edit =  document.getElementById("edit-btn");
edit.style.display = "none";
var show = document.getElementById("save-btn");
show.style.display = "block";
var logout = document.getElementById("logout");
logout.style.display = "none";
 document.getElementById("size").disabled = false ;
    }


</script>
    <div class="container" style="display: table-cell; vertical-align: middle; padding-top: 20px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $staff->firstname }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="{{ url('staff/edit') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">รหัสนักศึกษา</label>
                                <div class="col-md-6">
                                    <input  class="form-control"type="text" name="student_id" placeholder="57121072-3" disabled value="{{ $staff->student_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ชื่อจริง</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="firstname" id="firstname" placeholder="ธนพล" disabled value="{{ $staff->firstname }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">นามสกุล</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="lastname" placeholder="หล่อดี" disabled value="{{ $staff->lastname }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ชื่อเล่น</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nickname" placeholder="พลซัง" disabled value="{{ $staff->nickname }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">อีเมล</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="email" placeholder="lo.thanapon_st@tni.ac.th" disabled value="{{ $staff->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">เบอร์มือถือ</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="mobile" placeholder="0801234567" disabled value="{{ $staff->mobile }}">
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
                                                <input class="" type="checkbox" name="jobs[]" value="{{ $department->id }}" 
                                                @foreach($staffjob as $staffjobs)
                                                    
                                                        <?php if($staffjobs->student_id == $staff->student_id && $staffjobs->dept_id == $department->id) 
                                                            echo 'checked' ;
                                                        ?>
                                                
                                                @endforeach disabled> {{ $department->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ไซส์เสื้อ</label>
                                <div class="col-md-6">
                                    <select name ="shirt_size" id="size" disabled>
                                        <option value ="S" @if ($staff->shirt_size == "S") selected @endif> S </option>
                                        <option value ="M" @if ($staff->shirt_size == "M") selected @endif> M </option>
                                        <option value ="L" @if ($staff->shirt_size == "L") selected @endif> L </option>
                                        <option value ="XL" @if ($staff->shirt_size == "XL") selected @endif> XL </option>
                                        <option value ="XXL" @if ($staff->shirt_size == "XXL") selected @endif> XXL </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">โรคประจำตัว</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="congenital_disease" id="congenital_disease" rows="3" cols="40" disabled>{{ $staff->congenital_disease }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">อาหารที่แพ้</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="food_allergies" id="food_allergies" rows="3" cols="40" disabled>{{ $staff->food_allergies }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-primary" id="logout" href="{{ url('staff/index') }}">
                                        <i class="fa fa-btn fa-sign-in"></i>ออกจากระบบ
                                    </a>
                                    
                                    <a class"btn btn-primary" id="edit-btn" onclick = "toggleedit()" >
                                        <i class="fa fa-btn fa-sign0in"></i> Edit
                                        </a>
                                      <button type = "submit" class="btn btn-primary"  id="save-btn" href = "{{ url('staff/edit') }}" style = "display:none" >
                                      <i class="fa fa-btn fa-sign0in">                                          
                                      </i> >>Go Edit<< 
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