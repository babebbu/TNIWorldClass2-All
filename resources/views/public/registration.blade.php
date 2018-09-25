<!DOCTYPE HTML>

<html>

<head>
    <title>TNIWorldClass - Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>


    <link rel="stylesheet" href="css/animate.css">

    <!-- Vendors -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>-->

    <!--<link rel="stylesheet" href="vendors/dropzone/dropzone.css">
    <link rel="stylesheet" href="vendors/dropzone/basic.css">
    <script src="vendors/dropzone/dropzone.js"></script>-->

    <script src="vendors/ckeditor/ckeditor.js" type="text/javascript"></script>

    <!-- Custom -->
    <link href="css/registration.css" rel="stylesheet">

    <script type="text/javascript">
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
    </script>
    <script type="text/javascript" src="js/registration.js"></script>

</head>

<body>
<div id="registration-island-top" style="height: auto;">
    <img id="sky" src="images/sky.png">
    <img id="star" src="images/star.png">
    <img id="mountain" src="images/mountain.png">
    <img id="sea-wave-background" src="images/sea-bg.png">
    <img id="moon" class="animated bounceInUp" src="images/moon.png">
    <div class="island-wrapper">
        <img id="island" class="animated bounceIn" src="images/island.png">
    </div>
    <div id="ship-container"><img id="ship" src="images/ship.png" style="left: 0; right: auto;"></div>
    <img id="sea-wave" src="images/sea.png">

</div>

<div id="registration-section">
    <div class="step">
        <ol class="step">
            <li class="active" id="ball-1">1</li>
            <li id="ball-2">2</li>
            <li id="ball-3">3</li>
            <li id="ball-4">4</li>
            <li id="ball-5">5</li>
            <li id="ball-6">6</li>
            <li id="ball-7">7</li>
            <li id="ball-8">8</li>
        </ol>
    </div>

    <div class="input-container">
        <div class="input-section" id="step-1" style="display: block;">
            <h1>ขั้นตอนการสมัคร</h1>
            <ol style="width: 270px; margin: auto;">
                <li>เชื่อมต่อกับ Facebook</li>
                <li>กรอกข้อมูลส่วนตัว</li>
                <li>กรอกข้อมูลการติดต่อ</li>
                <li>กรอกข้อมูลอื่นๆ</li>
                <li>เลือกคณะ/สาขาที่สนใจ</li>
                <li>ตอบปัญหาวิชาการ</li>
                <li>ตอบปัญหาเชาวน์</li>
                <li>ตรวจสอบข้อมูล</li>
            </ol>
            <div class="container-fluid"><br>
                <p class="text-center"><small>ระหว่างการสมัคร น้องๆสามารถบันทึกไว้ก่อนโดยกดปุ่ม "ถัดไป" แล้วค่อยกลับมาแก้ภายหลังได้</small></p>
            </div>
            <div class="container-fluid">
                <div class="requirements">
                    <p class="text-center">คุณสมบัติผู้สมัคร
                    <ol>
                        <li>เป็นผู้ที่กำลังศึกษาอยู่ในระดับชั้นมัธยมศึกษาปีที่ 6 (ทุกสายการเรียน)</li>
                        <li>เป็นผู้ที่มีเกรดเฉลี่ยสะสม 4 ภาคการศึกษา 3.50 ขึ้นไป</li>
                        <li>เป็นผู้มีความประพฤติดี</li>
                        <li>มีความต้องการที่จะศึกษาต่อระดับปริญญาตรี ณ สถาบันเทคโนโลยีไทย-ญี่ปุ่น</li>
                        <li>สามารถเข้าร่วมกิจกรรมได้เต็มที่ ทั้ง Workshop การเรียน สอบเก็บคะแนน และทำกิจกรรมต่างๆภายในค่าย</li>
                        <li>ผู้ปกครองรับทราบและอนุญาตให้เข้าร่วมกิจกรรม</li>
                    </ol>
                    </p>
                </div>
            </div>
            <div class="step-control">
                กรอกรหัสบัตรประชาชน
                <input style="text-align:center;"  type ="text" name ="citizen_auth" id = "citizen_auth" class = "form-control">
                <div style="display: none;" id="fb-login"><fb:login-button onlogin="checkLoginState();">
                    </fb:login-button></div>
                <button class="btn pirate-btn btn-register next" id="fb-connect" onclick="fb_login()" value="2">สมัคร + เชื่อมต่อกับ Facebook</button>
            </div>
        </div>

        <div class="input-section" id="step-2" style="display: none;">
            <h1>ข้อมูลส่วนตัว</h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p><img id="profile-picture-preview" src="images/profile.png"></p>
                        <p class="text-center" style="margin-top: 25px;">
                        ภาพประจำตัว <u>ไม่</u>จำเป็นต้องเป็นภาพทางการ แต่<u>ต้องเห็นหน้าชัดเจน</u><br>
                        <small>หลังจากเลือกภาพแล้วอย่าลืมกดปุ่ม <u>อัพโหลด</u> นะครับ</small>
                        <form id="form-profile-pic" action="https://tniworldclass.com/registration/uploadprofilepic" method="post" enctype="multipart/form-data" target="upload_target">
                            {{ csrf_field() }}
                            <input type="hidden" id="upload_registrant_id" name="registrant_id">
                            <input type="hidden" id="upload_facebook_id" name="facebook_id">
                            <button type="button" id="choose-profile-btn" class="fileUpload btn pirate-btn">เลือกภาพ</button>
                            <button id="upload-profile-btn" type="submit" class="btn pirate-btn" style="display: none;">อัพโหลด</button>
                            <input type="file" name='profile-pic' id="choose-profile-input" style="display: none;">
                        </form>
                        <iframe id="upload_target" name="upload_target" src="#" style="display: none;"></iframe>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>คำนำหน้า</label>
                        <select name="title" id="title" class="form-control">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>ชื่อ</label>
                        <input name="firstname" id="firstname" type="text" class="form-control"  placeholder="ธนพล">
                    </div>
                    <div class="col-sm-4">
                        <label>นามสกุล</label>
                        <input name="lastname" id="lastname" type="text" class="form-control" placeholder="หล่อมาก">
                    </div>
                    <div class="col-sm-2">
                        <label>ชื่อเล่น</label>
                        <input name="nickname" id="nickname" type="text" class="form-control" placeholder="พล">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>เพศกำเนิด</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="M">ชาย</option>
                            <option value="F">หญิง</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>วันเกิด</label>
                        <input name="birthdate" id="birthdate" type="text" class="form-control" placeholder="19/09/2542">
                    </div>
                    <div class="col-sm-2">
                        <label>เชื้อชาติ</label>
                        <input name="ethnicity" id="ethnicity" type="text" class="form-control" placeholder="ไทย">
                    </div>
                    <div class="col-sm-2">
                        <label>สัญชาติ</label>
                        <input name="nationality" id="nationality" type="text" class="form-control" placeholder="ไทย">
                    </div>
                    <div class="col-sm-2">
                        <label>ศาสนา</label>
                        <select name="relogious" id="relogious" class="form-control">
                            <option value="N/A">ไม่ระบุ</option>
                            <option value="พุทธ">พุทธ</option>
                            <option value="คริสต์">คริสต์</option>
                            <option value="อิสลาม">อิสลาม</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>เลขประจำตัวประชาชน/เลขที่หนังสือเดินทาง</label>
                        <input name="citizen" id="citizen" type="text" class="form-control" placeholder="1100001010001">
                    </div>
                    <div class="col-sm-6">
                        <label>เป็นผู้สมัครโควตาสถาบันเทคโนโลยีไทย-ญี่ปุ่น?</label><br>
                        &nbsp;<input name="quota" id="quota" type="radio" value="1"> <label>ใช่</label> &nbsp;
                        <input name="quota" id="quota" type="radio"  value="0"> <label>ไม่</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>โรงเรียน</label>
                        <input name="school" id="school" type="text" class="form-control" placeholder="เซนต์ดอมินิก">
                        <div id="hah"  style="background: grey; font-size:20px; cursor:pointer;">

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>สายการเรียน</label>
                        <input name="school_major" id="school_major" type="text" class="form-control" placeholder="วิทย์-คณิต">
                    </div>
                    <div class="col-sm-3">
                        <label>จังหวัดที่ตั้งโรงเรียน</label>
                        <input name="school_province" id="school_province" type="text" class="form-control" placeholder="กรุงเทพฯ">
                        <div id="province_show1"  style="background: grey; font-size:20px; cursor:pointer;">

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>เกรดเฉลี่ยรวม 4 เทอม</label>
                        <input name="gpax" id="gpax" type="text" class="form-control" placeholder="3.5">
                    </div>
                </div>
            </div>

            <div class="step-control">
                <button class="btn pirate-btn back" value="1">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="3">ถัดไป &raquo;</button>
            </div>
        </div>

        <div class="input-section" id="step-3" style="display: none;">
            <h1>ข้อมูลการติดต่อ</h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <label>ที่อยู่</label>
                        <input name="address" id="address" type="text" class="form-control" placeholder="1771/1 ซ.พัฒนาการ 37 ถ.พัฒนาการ แขวงสวนหลวง">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>เขต/อำเภอ</label>
                        <input name="district" id="district" type="text" class="form-control" placeholder="สวนหลวง">
                    </div>
                    <div class="col-sm-4">
                        <label>จังหวัด</label>
                        <input name="province" id="province" type="text" class="form-control" placeholder="กรุงเทพฯ">
                        <div id="province_show2"  style="background: grey; font-size:20px; cursor:pointer;">

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>รหัสไปรษณีย์</label>
                        <input name="postal" id="postal" type="text" class="form-control" placeholder="10250">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>เบอร์โทรศัพท์ที่ติดต่อได้</label>
                        <input name="phone" id="phone" type="text" class="form-control" placeholder="080-123-4567">
                    </div>
                    <div class="col-sm-4">
                        <label>E-Mail</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="tanapol.handsome@gmail.com">
                    </div>
                    <div class="col-sm-4">
                        <label>Blog/Website/Twitter (ถ้ามี)</label>
                        <input name="blog" id="blog" type="text" class="form-control" placeholder="@TNIWorldClass, tniworldclass.com">
                    </div>
                    <div class="col-sm-4">
                        <label>ชื่อ-นามสกุล ผู้ปกครอง</label>
                        <input name="parent_name" id="parent_name" type="text" class="form-control" placeholder="อังศณา นิว">
                    </div>
                    <div class="col-sm-4">
                        <label>เกี่ยวข้องเป็น</label>
                        <input name="parent_relationship" id="parent_relationship" type="text" class="form-control" placeholder="มารดา">
                    </div>
                    <div class="col-sm-4">
                        <label>เบอร์โทรศัพท์ผู้ปกครอง</label>
                        <input name="parent_phone" id="parent_phone" type="text" class="form-control" placeholder="080-765-4321">
                    </div>
                </div>
            </div>

            <div class="step-control">
                <button class="btn pirate-btn back" value="2">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="4">ถัดไป &raquo;</button>
            </div>
        </div>

        <div class="input-section" id="step-4" style="display: none;">
            <h1>ข้อมูลอื่นๆ</h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-2">
                                <label>หมู่โลหิต</label>
                                <select name="bloodtype" id="bloodtype" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label>อาหารที่แพ้ (ถ้ามี)</label>
                                <input name="foodallergy" id="foodallergy" class="form-control" placeholder="">
                            </div>
                            <div class="col-sm-5">
                                <label>โรคประจำตัว (ถ้ามี)</label>
                                <input name="congenital_disease" id="congenital_disease" class="form-control" placeholder="">
                            </div>
                            <div class="col-sm-12">
                                <label>ยาที่ใช้ (ถ้ามี)</label>
                                <input name="medicine" id="medicine" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 referral">
                        <label>รู้จักค่ายนี้ได้อย่างไร</label>
                        <div><input name="knowus" id="knowus" value ="1" type="checkbox"> เว็บไซต์แนะแนวการศึกษา</div>
                        <div><input name="knowus" id="knowus" value ="2" type="checkbox"> เว็บไซต์สถาบันฯ</div>
                        <div><input name="knowus" id="knowus" value ="3" type="checkbox"> ฝ่ายแนะแนวโรงเรียน</div>
                        <div><input name="knowus" id="knowus" value ="4" type="checkbox"> เพื่อน/คนรู้จัก</div>
                        <div><input name="knowus" id="knowus" value ="5" type="checkbox"> Google</div>
                        <div><input name="knowus" id="knowus" value ="6" type="checkbox"> Dek-D</div>
                        <div><input name="knowus" id="knowus" value ="7" type="checkbox"> CampHUB</div>
                        <div><input name="knowus" id="other" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ"></div>
                    </div>
                </div>
            </div>

            <div class="step-control">
                <button class="btn pirate-btn back" value="3">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="5">ถัดไป &raquo;</button>
            </div>
        </div>

        <div class="input-section" id="step-5" style="display: none;">
            <h1>เลือกคณะ</h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="faculty-box">
                            <div class="faculty-circle" id="ENG" value = "1" onclick = "selectFaculty(1)">
                                วิศวกรรมศาสตร์
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="faculty-box">
                            <div class="faculty-circle" id="IT" value = "2" onclick = "selectFaculty(2)">
                                เทคโนโลยีสารสนเทศ
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="faculty-box">
                            <div class="faculty-circle" id="BA" value = "3" onclick = "selectFaculty(3)">
                                บริหารธุรกิจ
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-section"  id='section' style="margin-top: 60px; padding-top: 30px; border-top: 1px solid #475d73; display:none;">
                <h1 style="margin-bottom: 0;">เลือกสาขา</h1>
                <p class="text-center" style="margin-bottom: 30px; padding: 0 30px;">เลือก 3 สาขาที่สนใจอยากเข้าศึกษาต่อมากที่สุด เรียงตามลำดับความสนใจ<br><small>(บางคณะอาจมีผลต่อการคัดเลือก)</small></p>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center major-box" id="major-box">
                            <select class="form-control" id="form1" onchange = "changeMajor(1)">
                                <option value = "no">ไม่ระบุ</option>
                            </select>
                            <select class="form-control" id ="form2" onchange = "changeMajor(2)">
                                <option value = "no">ไม่ระบุ</option>
                            </select>
                            <select class="form-control" id ="form3" onchange = "changeMajor(3)">
                                <option value ="no">ไม่ระบุ</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javasscript">
			    	// some thing here
				</script>

            <div class="step-control" id="major_step" style="display: none;">
                <button class="btn pirate-btn back" value="4">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="6">ถัดไป &raquo;</button>
            </div>
        </div>

        <div class="input-section question" id="step-6" style="display: none;">
            <h1>ปัญหาวิชาการ</h1>
            <div class="container-fluid">
                <div class="unit" >
                    <p id = "question_faculty_1">
                        <!-- <p>1. ให้น้องๆ อธิบายถึงความหมายของคำว่า ข้อมูล, สารสนเทศ และเทคโนโลยีการสื่อสาร
                             พร้อมทั้งวิเคราะห์ถึงแนวโน้มของเทคโนโลยีว่าไปในทิศทางใดได้บ้าง ที่จะมีประโยชน์และส่งผลกระทบต่อชีวิตมนุษย์, สังคมและสิ่งแวดล้อมในอนาคต</p>

                         <textarea class="form-control" id="question-1"></textarea> !-->
                    </p>
                </div>
                <div class="unit" >
                    <p id = "question_faculty_2">
                        <!--  <p>2. ให้น้องๆออกแบบ Resumé เพื่อนำเสนอตัวเอง ขนาดไม่เกิน 10 MB โดย Resumé ของน้องๆ ต้อง<br>
                              - สามารถบ่งบอกตัวตนของน้องได้<br>
                              - นำเสนอผลงานที่ผ่านมาที่น้องภาคภูมิใจพร้อมอธิบายสั้นๆ ว่าทำไมถึงภูมิใจที่ได้ทำผลงานชิ้นนี้<br>
                              โดยน้องๆ ใช้สือได้ดังต่อไปนี้: JPG, GIF, PNG, PDF, MP4, HTML/CSS/JS<br>
                              หากมีหลายไฟล์ให้ zip ไฟล์แล้วค่อยอัพโหลด (.zip, .rar, .7z)
                          </p>
                          <button class="btn pirate-btn">เลือกไฟล์</button> !-->
                    </p>
                    <p id="question_Mt">
                    <div  id="uploadMT" style="padding: 10px 20px 7px; margin-bottom: 10px; display: none; background: rgba(255,255,255,0.2);">ยังไม่ได้อัพโหลดไฟล์</div>
                    <form id="form-question-pic" action="https://tniworldclass.com/registration/uploadQuestionMT" method="post" enctype="multipart/form-data" target="upload_question_target" >
                        {{ csrf_field() }}
                        <input type="hidden" id="upload_question_registrant_id" name="question_registrant_id" value="">
                        <input type="hidden" id="upload_question_facebook_id" name="question_facebook_id" value="">
                        <button type="button" id="choose-question-btn" class="fileUpload btn pirate-btn" style="display :none;">เลือกไฟล์</button>
                        <button id="upload-question-btn" type="submit" class="btn pirate-btn" style="display: none;">อัพโหลด</button>
                        <input type="file" name='question-pic' id="choose-question-input" style="display: none;">
                    </form>
                    <iframe id="upload_question_target" name="upload_question_target" src="#" style="display: none;"></iframe>
                    </p>
                </div>
                <div class="unit"  >
                    <p id = "question_faculty_3">
                        <!-- <p>3. ให้น้องๆยกตัวอย่างธุรกิจที่น้องคิดว่าสามารถนำเทคโนโลยีเข้าไปพัฒนาธุรกิจให้ดีขึ้นได้ 1 ตัวอย่าง พร้อมอธิบายว่าธุรกิจนั้นทำเกี่ยวกับอะไร มีระบบงานอย่างไร ทำไมน้องจึงเลือกธุรกิจนี้ พร้อมเสนอวิธีแผนและวิธีการพัฒนา</p>
                         <textarea class="form-control" id="question-3"></textarea> !-->
                    </p>
                </div>
            </div>

            <script type="text/javascript">
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                //CKEDITOR.replace('question_faculty_1');
                //CKEDITOR.replace('question_faculty_2');
                //CKEDITOR.replace('question_faculty_3');
            </script>


            <div class="step-control">
                <button class="btn pirate-btn back" value="5">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="7">ถัดไป &raquo;</button>
            </div>
        </div>



        <div class="input-section question" id="step-7" style="display: none;">
            <h1>ปัญหาเชาวน์</h1>
            <div class="container-fluid">
                <div class="unit">
                    <p>1. ถ้าน้องถูกเจ้านายที่ทำงานใช้งานอย่างและโดนเจ้านายแย่งผลงาน จะทำอย่างไร</p>
                    <textarea class="form-control" name ="question-emo-1" id="questionemo1"></textarea>
                </div>
                <div class="unit">
                    <p>2. ถ้าน้องติดอยู่บนเกาะกลางทะเลถูกตัดขาดจากโลกภายนอก มีของ 3 อย่างให้เลือก จะเลือกระหว่าง ร่ม เชือก 2 เมตร ขวด 1.5 ลิตร น้องจะเลือกของสิ่งใด เพราะเหตุใดจึงเลือก</p>
                    <textarea class="form-control" name ="question-emo-2" id="questionemo2"></textarea>
                </div>
            </div>

            <script type="text/javascript">
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('question-emo-1');
                CKEDITOR.replace('question-emo-2');
            </script>


            <div class="step-control">
                <button class="btn pirate-btn back" value="6">&laquo; กลับ</button>
                <button class="btn pirate-btn next" value="8">ถัดไป &raquo;</button>
            </div>
        </div>



        <div class="input-section question" id="step-8" style="display: none;">
            <h1 id="Head">ตรวจสอบข้อมูล</h1>
            <div class="container-fluid">
                <div class="text-center">
                    <p><img id="profile-picture-preview_1"  src="images/profile.png" width="300px" style="border-radius:10px;"></p>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>คำนำหน้า</label>
                        <select name="title" id ="title_1" class="form-control">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>ชื่อ</label>
                        <input name="firstname" id="firstname_1" type="text" class="form-control" placeholder="ธนพล">
                    </div>
                    <div class="col-sm-4">
                        <label>นามสกุล</label>
                        <input name="lastname" id="lastname_1" type="text" class="form-control" placeholder="หล่อมาก">
                    </div>
                    <div class="col-sm-2">
                        <label>ชื่อเล่น</label>
                        <input name="nickname" id="nickname_1" type="text" class="form-control" placeholder="พล">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>เพศกำเนิด</label>
                        <select name="gender" id="gender_1" class="form-control">
                            <option value="M">ชาย</option>
                            <option value="F">หญิง</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>วันเกิด</label>
                        <input name="birthdate" id ="birthdate_1" type="text" class="form-control" placeholder="19/09/2542">
                    </div>
                    <div class="col-sm-2">
                        <label>เชื้อชาติ</label>
                        <input name="ethnicity" id= "ethnicity_1" type="text" class="form-control" placeholder="ไทย">
                    </div>
                    <div class="col-sm-2">
                        <label>สัญชาติ</label>
                        <input name="nationality" id="nationality_1" type="text" class="form-control" placeholder="ไทย">
                    </div>
                    <div class="col-sm-2">
                        <label>ศาสนา</label>
                        <select name="relogious" id="relogious_1" class="form-control">
                            <option value="N/A">ไม่ระบุ</option>
                            <option value="พุทธ">พุทธ</option>
                            <option value="คริสต์">คริสต์</option>
                            <option value="อิสลาม">อิสลาม</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>เลขประจำตัวประชาชน/เลขที่หนังสือเดินทาง</label>
                        <input name="citizen" id="citizen_1" type="text" class="form-control" placeholder="1-1000-01010-00-1">
                    </div>
                    <div class="col-sm-6">
                        <label>เป็นผู้สมัครโควตาสถาบันเทคโนโลยีไทย-ญี่ปุ่น?</label><br>
                        &nbsp;<input name="quota_1" id="quota_1" type="radio" value="1"> <label>ใช่</label> &nbsp;
                        <input name="quota_1" id="quota_1" type="radio" value="0"> <label>ไม่</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>โรงเรียน</label>
                        <input name="school" id="school_1" type="text" class="form-control" placeholder="เซนต์ดอมินิก">
                    </div>
                    <div class="col-sm-3">
                        <label>สายการเรียน</label>
                        <input name="school_major" id="school_major_1" type="text" class="form-control" placeholder="วิทย์-คณิต">
                    </div>
                    <div class="col-sm-3">
                        <label>จังหวัดที่ตั้งโรงเรียน</label>
                        <input name="school_province" id="school_province_1" type="text" class="form-control" placeholder="กรุงเทพฯ">
                    </div>
                    <div class="col-sm-3">
                        <label>เกรดเฉลี่ยรวม 4 เทอม</label>
                        <input name="gpax"  id ="gpax_1" type="text" class="form-control" placeholder="3.5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label>ที่อยู่</label>
                        <input name="address" id="address_1" type="text" class="form-control" placeholder="1771/1 ซ.พัฒนาการ 37 ถ.พัฒนาการ แขวงสวนหลวง">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>เขต/อำเภอ</label>
                        <input name="district" id="district_1" type="text" class="form-control" placeholder="สวนหลวง">
                    </div>
                    <div class="col-sm-4">
                        <label>จังหวัด</label>
                        <input name="province" id="province_1" type="text" class="form-control" placeholder="กรุงเทพฯ">
                    </div>
                    <div class="col-sm-4">
                        <label>รหัสไปรษณีย์</label>
                        <input name="postal" id="postal_1" type="text" class="form-control" placeholder="10250">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>เบอร์โทรศัพท์ที่ติดต่อได้</label>
                        <input name="phone" id="phone_1" type="text" class="form-control" placeholder="080-123-4567">
                    </div>
                    <div class="col-sm-4">
                        <label>E-Mail</label>
                        <input name="email" id="email_1" type="email" class="form-control" placeholder="tanapol.handsome@gmail.com">
                    </div>
                    <div class="col-sm-4">
                        <label>Blog/Website/Twitter (ถ้ามี)</label>
                        <input name="blog" id="blog_1" type="text" class="form-control" placeholder="@TNIWorldClass, tniworldclass.com">
                    </div>
                    <div class="col-sm-4">
                        <label>ชื่อ-นามสกุล ผู้ปกครอง</label>
                        <input name="parent_name" id="parent_name_1" type="text" class="form-control" placeholder="ปภาดา จี๋มะลิ">
                    </div>
                    <div class="col-sm-4">
                        <label>เกี่ยวข้องเป็น</label>
                        <input name="parent_relationship" id="parent_relationship_1" type="text" class="form-control" placeholder="มารดา">
                    </div>
                    <div class="col-sm-4">
                        <label>เบอร์โทรศัพท์ผู้ปกครอง</label>
                        <input name="parent_phone" id="parent_phone_1" type="text" class="form-control" placeholder="080-765-4321">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>หมู่โลหิต</label>
                                    <select name="bloodtype" id="bloodtype_1" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label>อาหารที่แพ้ (ถ้ามี)</label>
                                    <input name="foodallergy" id="foodallergy_1" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-5">
                                    <label>โรคประจำตัว (ถ้ามี)</label>
                                    <input name="congenitial_disease" id="congenitial_disease_1" class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-12">
                                    <label>ยาที่ใช้ (ถ้ามี)</label>
                                    <input name="medicine" id="medicine_1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 referral">
                        <label>รู้จักค่ายนี้ได้อย่างไร</label>
                        <div><input name="knowus_1" id="knowus_1" value ="1" type="checkbox"> เว็บไซต์แนะแนวการศึกษา</div>
                        <div><input name="knowus_1" id="knowus_1" value ="2" type="checkbox"> เว็บไซต์สถาบันฯ</div>
                        <div><input name="knowus_1" id="knowus_1" value ="3" type="checkbox"> ฝ่ายแนะแนวโรงเรียน</div>
                        <div><input name="knowus_1" id="knowus_1" value ="4" type="checkbox"> เพื่อน/คนรู้จัก</div>
                        <div><input name="knowus_1" id="knowus_1" value ="5" type="checkbox"> Google</div>
                        <div><input name="knowus_1" id="knowus_1" value ="6" type="checkbox"> Dek-D</div>
                        <div><input name="knowus_1" id="knowus_1" value ="7" type="checkbox"> CampHUB</div>
                        <div><input name="knowus_1" id="other_1" type="text" class="form-control" placeholder="อื่นๆ โปรดระบุ"></div>
                    </div>
                </div>
                <div class ="">
                    <p id="Faculty_1"></p>
                    <p id="Major_1"></p>
                    <p id="Major_2"></p>
                    <p id="Major_3"></p>
                </div>
                <div class="row">
                    คำถาม 1 <p id="Q1"></p>
                    <p id="A1"></p>
                </div>
                <div class="row">
                    คำถาม 2<p id="Q2"></p>
                    <p id="A2"></p>
                </div>
                <div class="row" id="QQ3"  style="display : none;">
                    คำถาม 3 <p id="Q3"></p><br>
                    <p id="A3"></p>
                </div>
                <div class="row">
                    คำถามปัญหาเชาว์ 1  ถ้าน้องถูกเจ้านายที่ทำงานใช้งานอย่างและโดนเจ้านายแย่งผลงาน จะทำอย่างไร
                    <p id ="Chao1"></p>
                </div>
                <div class="row">
                    คำถามปัญหาเชาว์ 2 ถ้าน้องติดอยู่บนเกาะกลางทะเลถูกตัดขาดจากโลกภายนอก มีของ 3 อย่างให้เลือก จะเลือกระหว่าง ร่ม เชือก 2 เมตร ขวด 1.5 ลิตร น้องจะเลือกของสิ่งใด เพราะเหตุใดจึงเลือก
                    <p id ="Chao2"></p>
                </div>

            </div>

            <script type="text/javascript">
                $('#step-8').find($('input')).attr('disabled','true');
                $('#step-8').find($('select')).attr('disabled','true');
            </script>

            <div class="step-control">
                <button class="btn pirate-btn back" id="close" value="7">&laquo; กลับ</button>
                <button class="btn pirate-btn" id="finish" value="8">เสร็จสิ้น!</button>
                <a class="btn pirate-btn" id="goMain" href="https://tniworldclass.com" style="display:none;">กลับไปหน้าหลัก</a>

            </div>
        </div>

    </div>

</div>

<div id="footer">
    <div class="container footer-container">
        <div class="row">
            <div class="col-sm-6 text-left">
                &copy; TNI World Class
            </div>
            <div class="col-sm-6 text-right">
                Thai-Nichi Institute of Technology
            </div>
        </div>
    </div>
</div>
</body>

</html>