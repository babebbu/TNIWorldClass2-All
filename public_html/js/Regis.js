
$(document).ready(function(){
    $('.next').click(nextStep);
    $('.back').click(backStep);

    $('#choose-profile-btn').click(function(){
        $('#choose-profile-input').click();
    });

    $('#choose-profile-input').change(function(){
        readURL(this);
        $('#upload-profile-btn').css('display', 'inline-block');
    });
    
    $('#upload-profile-btn').click(function(){
        $('#form-profile-pic').submit();
        $('#upload-profile-btn').prop('disabled', true);
        $('#upload-profile-btn').html('กำลังอัพโหลด...');
    });

    $('#upload_target').load(function(){
        var profilePictureUploadStatus = $("#upload_target").contents().find("status").html();
        if(profilePictureUploadStatus == 'success'){
            $('#upload-profile-btn').css('display', 'none');
            $('#upload-profile-btn').prop('disabled', false);
        }
    });
     $('#choose-question-btn').click(function(){
        $('#choose-question-input').click();
    });

    $('#choose-question-input').change(function(){
        //readURLQuestion(this);
        $('#upload-question-btn').css('display', 'inline-block');
    });
    
    $('#upload-question-btn').click(function(){
        $('#form-question-pic').submit();
        $('#upload-question-btn').prop('disabled', true);
        $('#upload-question-btn').html('กำลังอัพโหลด...');
    });

    $('#upload_question_target').load(function(){
        var profilePictureUploadStatus = $("#upload_question_target").contents().find("status").html();
        if(profilePictureUploadStatus == 'success'){
            $('#upload-question-btn').css('display', 'none');
            $('#upload-question-btn').prop('disabled', false);
            $('#uploadMT').html(function(){
            	return "อัพโหลดไฟล์แล้ว";
            });
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-picture-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.fbAsyncInit = function() {
    FB.init({
        appId: '1074500879292053',
        cookie: true,  // enable cookies to allow the server to access
                       // the session
        xfbml: true,  // parse social plugins on this page
        version: 'v2.5' // use graph api version 2.5
    });
}

var facebook;

function fb_login(){
    if($('#citizen_auth').val() == "")
        {
            alert("กรุณากรอกรหัสบัตรประชาชน");

        }
        else
        {
    $('#fb-connect').html('กำลังเชื่อมต่อ...');
    FB.login(function(response) {
        if (response.status === 'connected') {
            FB.api('/me', function(response) {
                $('#fb-connect').html('สมัคร');
                facebook = response;
                registrantID = response.id;
                facebookID = response.name;
                authen()
                
            });
            // The person is logged into Facebook, but not your app.
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            document.getElementById('status').innerHTML = 'Please log ' +
                'into Facebook.';
        }
    });
}
}

var registrantID;
var facebookID;
function authen(){
    $.ajax({
        'url': "https://tniworldclass.com/registration/authen",
        'type': "POST",
        'dataType': "json",
        'data': {'facebook_id':registrantID,
                 'facebook_name':facebookID,
                 'citizen' : $('#citizen_auth').val()
                },
        'success': function (data) {

            registrantID = data.profile.id;
            facebookID   = data.profile.facebook_id;
        	if(data.profile.lock_worldclass != 10)
        	{
            proceedNext(2);
            //Step 1 //
            if(data.profile.profile_picture != "")
            $('#profile-picture-preview').attr('src', 'https://tniworldclass.com/registration/profilepic/'+registrantID+'/'+facebookID);
            if(data.profile.title != "")
            $('#title').val(data.profile.title);
            $('#firstname').val(data.profile.firstname);
            $('#lastname').val(data.profile.lastname);
            $('#nickname').val(data.profile.nickname);
            //gender here !!
            if(data.profile.gender != "")            
            $('#gender').val(data.profile.gender);

            $('#birthdate').val(data.profile.birthdate);
            $('#ethnicity').val(data.profile.ethnicity);
            $('#nationality').val(data.profile.nationality);
            if(data.profile.religious != "")
            $('#relogious').val(data.profile.religious);
            $('#citizen').val(data.profile.citizen);
            $('#upload_registrant_id').val(registrantID);
            $('#upload_facebook_id').val(facebookID);
            $('#upload_question_registrant_id').val(registrantID);
            $('#upload_question_facebook_id').val(facebookID);
            //Quota
            $('#quota[name="quota"][value="'+data.profile.quota+'"]').prop('checked',true);
            $quota = data.profile.quota;
            $('#school').val(data.profile.school_name);
            $('#school_major').val(data.profile.school_major);
            $('#school_province').val(data.profile.province_name);
            $('#gpax').val(data.profile.gpax);
            //Step 2 //
            $('#address').val(data.contact.address);
            $('#district').val(data.contact.district);
            $('#province').val(data.contact.province_name);
            $('#postal').val(data.contact.postal);
            $('#phone').val(data.contact.phone);
            $('#email').val(data.contact.email);
            $('#blog').val(data.contact.blog);
            $('#parent_name').val(data.contact.parent_name);
            $('#parent_relationship').val(data.contact.parent_relationship);
            $('#parent_phone').val(data.contact.parent_phone);
            

            if(data.medical.bloodtype != "")
            $('#bloodtype').val(data.medical.bloodtype);
            $('#foodallergy').val(data.medical.foodallergy);
            $('#congenital_disease').val(data.medical.congenital_disease);
            $('#medicine').val(data.medical.medicine);

            for(var i = 0 ; i<data.answer.length;i++)
            {
                if(data.answer[i].question_id == 'EMO-1')
                CKEDITOR.instances.questionemo1.setData(data.answer[i].answer);
                else if(data.answer[i].question_id == 'EMO-2')
                CKEDITOR.instances.questionemo2.setData(data.answer[i].answer);
            }
            if(data.knowus != undefined){
            for(var i = 0 ;i<data.knowus.length-1;i++)
            {
            	if(data.knowus[i].how >=0 ){
            		$('#knowus[name="knowus"][value="'+data.knowus[i].how+'"]').prop('checked',true);
            		
            	}
            }
            
            	$('#other').val(data.knowus[7].how);
            }
            if(data.major.faculty == "BUS" || data.major.faculty == "ENG" || data.major.faculty == "INT")
            {
            	$('#major_step').show();
            	$('#section').show();
            	if(data.major.faculty =="ENG")
    			{
                    
                    $('#ENG').addClass('faculty-circle-selected');
        			showAll = ENG;
        			facultySelect = "ENG";
    			}
    			else if(data.major.faculty == "INT")
    			{
                   
                    $('#IT').addClass('faculty-circle-selected');
    				facultySelect = "INT";
       	 			showAll = IT;
    			}
    			else if (data.major.faculty == "BUS")
    			{
                  
                    $('#BA').addClass('faculty-circle-selected');
    				facultySelect = "BUS";
        			showAll = BA;
    			}
     	$('#form1').html(function(){
            var show_major1 = "";

            for(var i = 0 ; i< showAll.length;i++)
            {
            	if(showAll[i].substring(0,2) == data.major.first)
            	{
                show_major1 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
                break;
            	}
            }
            for(var i = 0 ; i< showAll.length;i++)
            {
            	if(showAll[i].substring(0,2) != data.major.first )
            	{
                show_major1 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
            	}
            }
            show_major1 += '<option value = "no">ไม่ระบุ</option>';
            return show_major1;
        });
    
            $('#form2').html(function(){
            	var show_major2 ="";
            	if(data.major.second == "no"){
            		show_major2 += '<option value = "no">ไม่ระบุ</option>';
            		
            	}
            	else
            	{
            	for(var i = 0 ; i< showAll.length;i++)
            {
            	if(showAll[i].substring(0,2) == data.major.second )
            	{
                show_major2 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
                break;
            	}
            }
        }
           
            for(var i = 0 ; i< showAll.length;i++)
            {
            	if(showAll[i].substring(0,2) != data.major.second && showAll[i].substring(0,2) != data.major.first)
            	{
                show_major2 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
            	}
            }
            
                show_major2 += '<option value = "no">ไม่ระบุ</option>';
        	
                return show_major2;
            });
    
            $('#form3').html(function(){
            	var show_major3 ="";
            	if(data.major.second == "no"){
            		show_major3 += '<option value = "no">ไม่ระบุ</option>';
            		return show_major3;
            	}
            	if(data.major.third == "no"){
            		show_major3 += '<option value = "no">ไม่ระบุ</option>';
            	}
            	else{
            	for(var i = 0 ; i< showAll.length;i++)
            	{
            	if(showAll[i].substring(0,2) == data.major.third)
            	{
                show_major3 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
                break;
            	}
            }
            }
            for(var i = 0 ; i< showAll.length;i++)
            {
            	if(showAll[i].substring(0,2) != data.major.third && showAll[i].substring(0,2) != data.major.second && showAll[i].substring(0,2) != data.major.first)
            	{
                show_major3 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
            	}
            }
            if(data.major.third != "no")
            show_major3 += '<option value = "no">ไม่ระบุ</option>';
        	

                return show_major3;
            });
            }
        }
        ///////
        ////
         else{
         	checkGetAll();
            $('#Head').html(function(){
            return 'สมัครเสร็จสิ้น';
        });
     $('#step-' +  1).fadeOut();
    $('#step-' + 8).delay(250).fadeIn(1000);

    $('#ball-' + 1).removeClass('active');
    $('#ball-' + 8).addClass('active');
    $('#close').hide();
    $('#finish').hide();
    $('#goMain').show();
    if ($(window).width() >= 1200) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + (115*8)) + 'px');
    }
    else if ($(window).width() <= 320) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + (8*12)) + 'px');
    }
    else if ($(window).width() <= 480) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + (8*20)) + 'px');
    }
    else if ($(window).width() <= 667) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + (8*50)) + 'px');
    }
    else if ($(window).width() <= 750) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + (8*60)) + 'px');
    }
         }   //End Major
            
            //jsProvinces(data.provinces);
            
            //End Ajax

            },
        'error': showError,
    });
}
var questionID = new Array(10);
var questionName = new Array(10);
function jsQuestion(data)
{
	for(var i = 0 ;i<data.questions.length;i++)
	{
		questionID[i] = data.questions[i].question_id;
		questionName[i] = data.questions[i].question;
	}
}
var provinces = new Array(77) ;
function jsProvinces(data){
    
    for(var i = 0;i<data.province.length;i++)
    {
        provinces[i] = data.province[i].province_name;
    }
}
$(document).ready(function()
{	$('#school_province').keyup(function(){
	var out = 0;	
	var	customProvince = $('#school_province').val();
	var showProvince = "";
	var customlength ;
	for(var i = 0; i<provinces.length;i++)
	{
		if(out > 4)
			break;
		customLength = customProvince.length;
		
		for(var j = 0;j<provinces[i].length;j++)
		{
			if(customLength > provinces[i].length)
				break;
		if(customProvince == provinces[i].substr(j,customLength))
		{
			showProvince  += '<div  onclick = "insertProvince(this.innerHTML,'+1+')">'+provinces[i]+'</div>';
			out++;

			break;
		}
		customLength++;
		}
		
	}
		$('#province_show1').html(function()
		{			
			return showProvince;
		});
	
});
	$('#province').keyup(function()
		{
			var out = 0;	
	var	customProvince = $('#province').val();
	var showProvince = "";
	var customlength ;
	for(var i = 0; i<provinces.length;i++)
	{
		if(out > 4)
			break;
		customLength = customProvince.length;
		
		for(var j = 0;j<provinces[i].length;j++)
		{
			if(customLength > provinces[i].length)
				break;
		if(customProvince == provinces[i].substr(j,customLength))
		{
			showProvince  +=  '<div  onclick = "insertProvince(this.innerHTML,'+2+')">'+provinces[i]+'</div>';
			out++;

			break;
		}
		customLength++;
		}
	}

	$('#province_show2').html(function()
		{			
			return showProvince;
		});

});
});
function insertProvince(value,data){
	if(data == 1)
    {
		$('#school_province').val(value);
        $('#province_show1').html(function(){
            return '<p> </p>';
        });
    }
	else{
		$('#province').val(value);
        $('#province_show2').html(function(){
            return '<p> </p>';
        });
    }
}
function backStep(){
    $('#step-'+(parseInt(this.value)+1)).fadeOut();
    $('#step-'+parseInt(this.value)).delay(250).fadeIn(1000);

    $('#ball-'+(parseInt(this.value)+1)).removeClass('active');
    $('#ball-'+parseInt(this.value)).addClass('active');

    if($(window).width() >= 1200){
        var left = parseFloat($('#ship').css('left').replace('px',''));
        $('#ship').css('left', parseFloat(left-115)+'px');
    }
    else if($(window).width() <= 320){
        var left = parseFloat($('#ship').css('left').replace('px',''));
        $('#ship').css('left', parseFloat(left-12)+'px');   
    }
    else if($(window).width() <= 480){
        var left = parseFloat($('#ship').css('left').replace('px',''));
        $('#ship').css('left', parseFloat(left-20)+'px');
    }
    else if($(window).width() <= 667){
        var left = parseFloat($('#ship').css('left').replace('px',''));
        $('#ship').css('left', parseFloat(left-50)+'px');
    }
    else if($(window).width() <= 750){
        var left = parseFloat($('#ship').css('left').replace('px',''));
        $('#ship').css('left', parseFloat(left-60)+'px');
    }
}

function nextStep(){
    var stepNumber = this.value;
    var value ;
    var check = "";
   
    if(stepNumber == 2) {
        if($('#citizen_auth').val() == "")
        {
            check+= "กรุณากรอกรหัสบัตรประชาชน";
        }
        else{
         $.ajax({
            'url' : "https://tniworldclass.com/registration/getProvince",
            'dataType' : "json",
            'success' : function(data)
            {
                jsProvinces(data);
            },
        });
         $.ajax({
            'url' : "https://tniworldclass.com/registration/getQuestion",
            'dataType' : "json",
            'success': function(data)
            {
                jsQuestion(data);
            },
         });
     }
        return;
    }
    else if(stepNumber == 3)
        {
            if($('#profile-picture-preview').attr("src") == "images/profile.png")
            	check += "กรุณาอัพโหลดรูปภาพ\n";
            if($('#firstname').val()    ==  "")
                check+= 'กรุณาใส่ชื่อ\n';
            if($('#lastname').val()     ==  "")
                check+='กรุณาใส่นามสกุล\n';
            if($('#nickname').val()     ==  "")
                check+='กรุณาใส่ชื่อเล่น\n';
            if($('#birthdate').val()     ==  "")
                check+='กรุณาใส่วันเกิด\n';
            if($('#ethnicity').val()     ==  "")
                check+='กรุณาใส่เชื้อชาติ\n';
            if($('#nationality').val()     ==  "")
                check+='กรุณาใส่สัญชาติ\n';
            if($('#citizen').val()     ==  "")
                check+='กรุณาใส่บัตรประชาชน\n';

            if($('#quota[name="quota"]:checked').val() != 0 && $('#quota[name="quota"]:checked').val() != 1	)
                check+='กรุณาใส่โควต้า\n';
            if($('#school').val()     ==  "")
                check+='กรุณาใส่โรงเรียน\n';
            if($('#school_major').val()     ==  "")
                check+='กรุณาใส่สายการเรียน\n';
            if($('#school_province').val()     ==  "")
                check+='กรุณาใส่จังหวัดโรงเรียน\n';
            if($('#gpax').val()     ==  "")
                check+='กรุณาใส่เกรด\n';
            if(check == "") 
            {
                value = {
                        'id'                :   registrantID,
                        'facebook_id'       :   facebookID,
                        'step'              :   (stepNumber-1),
                        'title'             :   $('#title').val(),
                        'firstname'         :   $('#firstname').val(),
                        'lastname'          :   $('#lastname').val(),
                        'nickname'          :   $('#nickname').val(),
                        'gender'            :   $('#gender').val(),
                        'birthdate'         :   $('#birthdate').val(),
                        'ethnicity'         :   $('#ethnicity').val(),
                        'nationality'       :   $('#nationality').val(),
                        'relogious'         :   $('#relogious').val(),
                        'citizen'           :   $('#citizen').val(),
                        'quota'             :   $('#quota[name="quota"]:checked').val(),
                        'school'            :   $('#school').val(),
                        'school_major'      :   $('#school_major').val(),
                        'school_province'   :   $('#school_province').val(),
                        'gpax'              :   $('#gpax').val()

                        };//{'title':$('#title').val()};
                
              
            }
            else
                alert(check);
        }
    else if(stepNumber == 4)
        {
            if($('#address').val()  ==  "")
                check+= 'กรุณากรอกที่อยู่\n';
            if($('#district').val()    ==  "")
                check+= ' กรุณากรอกเขค\n';
            if($('#province').val()     ==  "")
                check+= 'กรุณากรอกจังหวัด\n';
            if($('#postal').val()       ==  "")
                check+='กรุณารหัสไปรษณีย์\n';
            if($('#phone').val()        ==  "")
                check+='กรุณากรอกเบอร์โทรศัพท์\n';
            if($('#email').val()        ==  "")
                check+='กรุณากรอกอีเมลล์\n';
            if($('#parent_name').val()  ==  "")
                check+='กรุณากรอกชื่อพ่อแม่\n';
            if($('#parent_relationship').val()  ==  "")
                check+='กรุณากรอกความสัมพันธ์ของผู้ปกครอง\n';
            if($('#parent_phone').val() ==  "")
                check+='กรุณากรอกเบอร์โทรศัพท์พ่อแม่';
            if(check == "")
                value = 
                {
                        'id'                    :   registrantID,
                        'facebook_id'           :   facebookID,
                        'step'                  :   (stepNumber-1),

                        ////
                        'address'               :   $('#address').val(),
                        'district'              :   $('#district').val(),
                        'province'              :   $('#province').val(),
                        'postal'                :   $('#postal').val(),
                        'phone'                 :   $('#phone').val(),
                        'email'                 :   $('#email').val(),
                        'blog'                  :   $('#blog').val(),
                        'parent_name'           :   $('#parent_name').val(),
                        'parent_relationship'   :   $('#parent_relationship').val(),
                        'parent_phone'          :   $('#parent_phone').val()
                        ///
                };
            else
                alert(check);
        }
        else if(stepNumber == 5)
        {
        	var k1,k2,k3,k4,k5,k6,k7,other;

        	
        	if($('#knowus[name="knowus"][value="1"]').prop('checked'))
				k1 = 1;
			else
				k1=-1;
			if($('#knowus[name="knowus"][value="2"]').prop('checked'))
				k2=2;
			else
				k2=-2;
			if($('#knowus[name="knowus"][value="3"]').prop('checked'))
				k3=3;
			else
				k3=-3;
			if($('#knowus[name="knowus"][value="4"]').prop('checked'))
				k4=4;
			else
				k4=-4;
			if($('#knowus[name="knowus"][value="5"]').prop('checked'))
				k5=5;
			else
				k5=-5;
			if($('#knowus[name="knowus"][value="6"]').prop('checked'))
				k6=6;
			else
				k6=-6;
			if($('#knowus[name="knowus"][value="7"]').prop('checked'))
				k7=7;
			else
				k7=-7;
			if($('#other').val() == "")
				other = "No";
			else
				other = $('#other').val();
            value = 
            {
                'id'                :   registrantID,
                'facebook_id'       :   facebookID,
                'step'              :   (stepNumber-1),
                ////vvvvvvv
                'worldclass'		:   20,
                'bloodtype'         :   $('#bloodtype').val(),
                'foodallergy'       :   $('#foodallergy').val(),
                'congenital_disease':   $('#congenital_disease').val(),
                'medicine'          :   $('#medicine').val(),
                'know1'				: k1,
                'know2'				: k2, 
                'know3'				: k3, 
                'know4'				: k4, 
                'know5'				: k5, 
                'know6'				: k6,
                'know7'				: k7,
                'other'				: other


            }
        }
         else if(stepNumber == 6)
        {
        	if($('#form1').val() == "no"){
        		check+= "กรุณาเลือกสาขาอย่างน้อยหนึ่งสาขา";
        		alert(check);
        	}

            value =
            {
            	'id'                : registrantID,
                'facebook_id'       : facebookID,
                'step'              : (stepNumber-1),
            	'faculty'			: facultySelect,
            	'first'				: $('#form1').val(),
            	'second'			: $('#form2').val(),
            	'third'				: $('#form3').val() 
            };

            $('#question_faculty_1').html(function(){
            	return ""
            });
            $('#question_faculty_2').html(function(){
            	return ""
            });
            $('#question_faculty_3').html(function(){
            	return ""
            });
            if(facultySelect == "ENG")
            {
            	$('#uploadMT').hide();
                $('#choose-question-btn').hide();
            	var quest1 = "";
            	$('#question_faculty_1').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "ENG-1")
            			{

            			quest1 += '<p>1.'+questionName[i]+'</p>';
            			break;
            			}
            		}
            		quest1 += '<textarea class="form-control" id="question1"></textarea>';
                    quest1 += '<script type ="text/javascript"> CKEDITOR.replace("question1");</script>';
            		return quest1;
            	});
                var quest2 = "";
                $('#question_faculty_2').html(function(){
                    quest2 += '<div class="col-sm-6">';
                    for(var i = 0 ; i<questionID.length;i++)
                    {
                    if(questionID[i] == "ENG-2")
                    {
                        quest2 += '<p>2. '+questionName[i]+'</p>';
                        break;
                    }
                    }
                    quest2 += '<img src ="images/ENG/ENG-1.png" width="100%">';
                    quest2 += '<input type="text" class="form-control" id="question2">';
                    quest2 += '</div>';
                    quest2 += '<div class="col-sm-6">';
                    for(var i = 0 ; i<questionID.length;i++)
                    {
                    if(questionID[i] == "ENG-3")
                    {
                        quest2 += '<p>3. '+questionName[i]+'</p>';
                        break;
                    }
                    }
                    quest2 += '<img src ="images/ENG/ENG-2.png" width ="100%">';

                    quest2 += '<input type="text" class="form-control" id="question3">';
                    quest2 += '</div>';
                    
                    return quest2;
                });

            }
            else if(facultySelect == "INT")
            {
            	$('#uploadMT').show();
                 $('#choose-question-btn').show();
            	var quest1="";
            	var quest2="";
            	var quest3="";
            	$('#question_faculty_1').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "INT-1")
            			{
            			quest1 += '<p>1.'+questionName[i]+'</p>';
            			break;
            			}
            		}
            		quest1 += '<textarea class="form-control" id="question1"></textarea>';
                    quest1 += '<script type ="text/javascript"> CKEDITOR.replace("question1");</script>';
            		return quest1;
            	});
            	$('#question_faculty_2').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "INT-2")
            			{
            			quest2 += '<p>2.'+questionName[i]+'</p>';
            			break;
            			}
            			
            		}
            		
            		return quest2;
            	});
            	$('#question_faculty_3').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "INT-3")
            			{
            			quest3 += '<p>3.'+questionName[i]+'</p>';
            			break;
            			}
            		}
            		quest3 += '<textarea class="form-control" id="question3"></textarea>';
                    quest3 += '<script type ="text/javascript"> CKEDITOR.replace("question3");</script>';
            		return quest3;
            	});

            }
            else if(facultySelect == "BUS")
            {
            	$('#uploadMT').hide();
                $('#choose-question-btn').hide();
            	var quest1="";
            	var quest2="";
            	$('#question_faculty_1').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "BUS-1")
            			{
            			quest1 += '<p>1.'+questionName[i]+'</p>';
            			break;
            			}
            		}
            		quest1 += '<textarea class="form-control" id="question1"></textarea>';
                    quest1 += '<script type ="text/javascript"> CKEDITOR.replace("question1");</script>';
            		return quest1;
            	});
            	$('#question_faculty_2').html(function()
            	{
            		for(var i = 0 ; i<questionID.length;i++)
            		{
            			if(questionID[i] == "BUS-2")
            			{
            			quest2 += '<p>2.'+questionName[i]+'</p>';
            			break;
            			}
            			
            		}
            		quest2 += '<textarea class="form-control" id="question2"></textarea>';
                    quest2 += '<script type ="text/javascript"> CKEDITOR.replace("question2");</script>';
            		return quest2;
            	});

            }
            if(check == "")
            {
                if(facultySelect == "ENG")
                {
                    getFacultyQuiz();
                }
                else if(facultySelect == "INT")
                {
                    getFacultyQuiz();
                }
                else if(facultySelect == "BUS")
                {
                    getFacultyQuiz();
                }
            }

        }
         else if(stepNumber == 7)
        {
        	
            
                
                    if(facultySelect == "ENG")
                    {
                    	
                        if(CKEDITOR.instances.question1.getData() == "")
                            check += "กรุณากรอกคำถามที่ 1";
                        if($('#question2').val() == "")
                            check += "กรุณากรอกคำถามที่ 2";
                        if($('#question3').val() == "")
                            check += "กรุณากรอกคำถามที่ 3";
                        if(check == "")
                        {
                        value = {
                                'id'    :registrantID,
                                'facebook_id'   : facebookID,
                                'step'          : (stepNumber-1),
                                'Faculty'       : facultySelect,
                                'question1'     : CKEDITOR.instances.question1.getData(),
                                'question2'     : $('#question2').val(),
                                'question3'     : $('#question3').val()
                        };
                       	$('#uploadMT').html(function(){
            	return "ยังไม่อัพไฟล์";
            });
                    	}
                        else
                            alert(check);
                      
                    }
                
                    else if(facultySelect == "INT")
                    {
                    	
                        if(CKEDITOR.instances.question1.getData() == "")
                            check += "กรุณากรอกคำถามที่ 1";
                        if(CKEDITOR.instances.question3.getData() == "")
                            check += "กรุณากรอกคำถามที่ 3";
                        if(check == "")
                        {
                            value = {
                                    'id' :registrantID,
                                    'facebook_id' : facebookID,
                                    'step' : (stepNumber-1),
                                    'Faculty' : facultySelect,
                                    'question1' : CKEDITOR.instances.question1.getData(),
                                    'question3' : CKEDITOR.instances.question3.getData()
                            };
                           
                        }
                        else
                            alert(check);
                    }
                    else if(facultySelect =="BUS")
                    {

                        if(CKEDITOR.instances.question1.getData() == "")
                            check += "กรุณากรอกคำถามที่ 1";
                        if(CKEDITOR.instances.question2.getData() == "")
                            check += "กรุณากรอกคำถามที่ 2";
                        if(check == "")
                        {
                        value = {
                                'id' :registrantID,
                                'facebook_id' : facebookID,
                                'step' : (stepNumber-1),
                                'Faculty' : facultySelect,
                                'question1' : CKEDITOR.instances.question1.getData(),
                                'question2' : CKEDITOR.instances.question2.getData()
                                };
                       $('#uploadMT').html(function(){
            				return "<p>ยังไม่อัพไฟล์</p>";
            			});
                        }
                        else
                            alert(check);
                    }
        }
         else if(stepNumber == 8)
        {
            
            if(CKEDITOR.instances.questionemo1.getData()== "")
                check += "กรุณาตอบคำถามข้อที่ 1";
            if(CKEDITOR.instances.questionemo2.getData() == "")
                check += "กรุณาตอบคำถามข้อที่ 2";
            if(check == "")
            {
            var a1 = CKEDITOR.instances.questionemo1.getData();
            var a2 = CKEDITOR.instances.questionemo2.getData();
                        value = {
            'id'                : registrantID,
            'facebook_id'       : facebookID,
            'step'              : (stepNumber-1),
            'question_1' : a1,
            'question_2' : a2
            		};
                    
           }
            else
                alert(check);

        }
    if(check == "")
    {
        $.ajax({
            'url': "https://tniworldclass.com/registration/update",
            'type': "POST",
            'dataType': "json",
            'data': value,
            'success': proceedNext(stepNumber),
        });
        if(stepNumber == 8)
            checkGetAll();
    }
}

function getFacultyQuiz(){
    $.ajax({
    'url' : 'https://tniworldclass.com/registration/getFacultyQuiz',
    'type' : "POST",
    'dataType' : "json",
    'data' : {'id': registrantID,'facebook_id':facebookID},
    'success' : function(data){
        if(facultySelect == "ENG")
        {
            for(var i = 0 ;i<data.answer.length;i++)
            {
            if(data.answer[i].question_id == "ENG-1")
                CKEDITOR.instances.question1.setData(data.answer[i].answer);
            else if(data.answer[i].question_id == "ENG-2")
                $('#question2').val(data.answer[i].answer);
            else if(data.answer[i].question_id == "ENG-3")
                $('#question3').val(data.answer[i].answer);
            }
        }
        else if(facultySelect == "INT")
        {
            for(var i = 0 ;i<data.answer.length;i++)
            {
            if(data.answer[i].question_id == "INT-1")
                CKEDITOR.instances.question1.setData(data.answer[i].answer);
            ///
            ///
            else if(data.answer[i].question_id =="INT-2" && data.answer[i].answer != "")
            	$('#uploadMT').html(function(){
            	return "อัพโหลดไฟล์แล้ว";
            });
            ///
            else if(data.answer[i].question_id == "INT-3")
                CKEDITOR.instances.question3.setData(data.answer[i].answer);
            }
        }
        else if(facultySelect == "BUS")
        {
            for(var i = 0 ;i<data.answer.length;i++)
            {
            if(data.answer[i].question_id == "BUS-1")
                CKEDITOR.instances.question1.setData(data.answer[i].answer);    
            else if(data.answer[i].question_id == "BUS-2")
                CKEDITOR.instances.question2.setData(data.answer[i].answer);
            }
        }
    },
    'error' : showError,
/////
    });
}

function showError () {
    alert('fail');
}
function checkGetAll()
{
    $.ajax({
        'url' : "https://tniworldclass.com/registration/checkAll",
        'type' : "POST",
        'dataType' : "json",
        'data' : {
                    'registrantID':registrantID,
                    'facebookID'  :facebookID
                 },
        'success' : function(data)
        {
            
            //Step 1 //
            $('#profile-picture-preview_1').attr('src', 'https://tniworldclass.com/registration/profilepic/'+registrantID+'/'+facebookID);
            $('#title_1').val(data.profile.title);
            $('#firstname_1').val(data.profile.firstname);
            $('#lastname_1').val(data.profile.lastname);
            $('#nickname_1').val(data.profile.nickname);
            //gender here !!            
            $('#gender_1').val(data.profile.gender);

            $('#birthdate_1').val(data.profile.birthdate);
            $('#ethnicity_1').val(data.profile.ethnicity);
            $('#nationality_1').val(data.profile.nationality);
            $('#relogious_1').val(data.profile.religious);
            $('#citizen_1').val(data.profile.citizen);
            //$('#upload_registrant_id').val(registrantID);
            //$('#upload_facebook_id').val(facebookID);
            //Quota
            $('#quota_1[name="quota_1"][value="'+data.profile.quota+'"]').prop('checked',true);
            $quota = data.profile.quota;
            $('#school_1').val(data.profile.school_name);
            $('#school_major_1').val(data.profile.school_major);
            $('#school_province_1').val(data.profile.province_name);
            $('#gpax_1').val(data.profile.gpax);
            //Step 2 //
            $('#address_1').val(data.contact.address);
            $('#district_1').val(data.contact.district);
            $('#province_1').val(data.contact.province_name);
            $('#postal_1').val(data.contact.postal);
            $('#phone_1').val(data.contact.phone);
            $('#email_1').val(data.contact.email);
            $('#blog_1').val(data.contact.blog);
            $('#parent_name_1').val(data.contact.parent_name);
            $('#parent_relationship_1').val(data.contact.parent_relationship);
            $('#parent_phone_1').val(data.contact.parent_phone);
            
            $('#bloodtype_1').val(data.medical.bloodtype);
            $('#foodallergy_1').val(data.medical.foodallergy);
            $('#congenital_disease_1').val(data.medical.congenital_disease);
            $('#medicine_1').val(data.medical.medicine);

            for(var i = 0 ;i<data.knowus.length-1;i++)
            {
                if(data.knowus[i].how >=0 ){
                    $('#knowus_1[name="knowus_1"][value="'+data.knowus[i].how+'"]').prop('checked',true);
                    
                }
            }
            $('#other_1').val(data.knowus[7].how);
            $('#Chao1').html(function(){
                        return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_chao[0].answer +'</div>';
                    });
            $('#Chao2').html(function(){
                        return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_chao[1].answer+'</div>';
                    });


            //major
            if(data.major.faculty =="ENG")
                {
                    $('#QQ3').show();
                    showAll = ENG;
                    facultySelect = "ENG";
                    $('#Faculty_1').html(function()
                        {
                            return "คณะวิศวกรรมศาสตร์";
                        });
                    $('#Q1').html(function(){
                        return data.question_Faculty[0].question;
                    });
                    $('#Q2').html(function(){
                        return data.question_Faculty[1].question;
                    });
                    $('#Q3').html(function(){
                        return data.question_Faculty[2].question;
                    }); 
                    $('#A1').html(function(){
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_Faculty[0].answer+'</div>';
                    });
                    $('#A2').html(function(){
                        var quest ="";

                        quest += '<div class="col-sm-6"><img src ="images/ENG/ENG-1.png" width ="100%">';
                        quest += '<input type="text" id="AA2"  class="form-control" disabled value="'+data.answer_Faculty[1].answer+'"> </div>';
                        return quest;
                    });
                    $('#A3').html(function(){
                        var quest= "";
                        quest += '<div class="col-sm-6"><img src ="images/ENG/ENG-2.png" width ="100%">';
                        quest += '<input type="text" id="AA3" class="form-control"  disabled value="'+data.answer_Faculty[2].answer+'"> </div>';
                        return quest;
                    });

                }
                else if(data.major.faculty == "INT")
                {
                    $('#QQ3').show();
                    facultySelect = "INT";
                    showAll = IT;      
                    $('#Faculty_1').html(function()
                        {
                            return "คณะเทคโนโลยีสารสนเทศ";
                        }); 
                    $('#Q1').html(function(){
                        return data.question_Faculty[0].question;
                    });
                    $('#Q2').html(function(){
                        return data.question_Faculty[1].question;
                    });
                    $('#Q3').html(function(){
                        return data.question_Faculty[2].question;
                    }); 
                    $('#A1').html(function(){
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_Faculty[0].answer+'</div>';
                    });
                    $('#A2').html(function(){
                    	if(data.answer_Faculty[1].answer != "")
                    		var show_fac = data.answer_Faculty[1].answer ;
                    	else
                    		var show_fac = "ยังไม่ได้อัพโหลดไฟล์";
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;"> <p>'+show_fac+'</p></div>';
                    });
                    $('#A3').html(function(){
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_Faculty[2].answer+'</div>';
                    });
                    

                }
                else if (data.major.faculty == "BUS")
                {
                    $('#QQ3').hide();
                    facultySelect = "BUS";
                    showAll = BA;
                    $('#Faculty_1').html(function()
                        {
                            return "คณะบริหารธุรกิจ";
                        });
                    $('#Q1').html(function(){
                        return data.question_Faculty[0].question;
                    });
                    $('#Q2').html(function(){
                        return data.question_Faculty[1].question;
                    });
                    $('#A1').html(function(){
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_Faculty[0].answer+'</div>';
                    });

                    $('#A2').html(function(){
                            return '<div class="col-sm-12" style="background : rgba(255,255,255,0.3); border-radius:10px; display:table;">'+data.answer_Faculty[1].answer+'</div>';
                    });

                }

            for(var i = 0 ;i<showAll.length;i++)
            {
                if(data.major.first == showAll[i].substring(0,2))
                {
                    $('#Major_1').html(function()
                        {
                            return '<p> '+showAll[i]+'</p>';
                        });
                    break;
                }
            }
            for(var i = 0 ;i<showAll.length;i++)
            {
                if(data.major.second == showAll[i].substring(0,2))
                {
                    $('#Major_2').html(function()
                        {
                            return '<p>'+showAll[i]+'</p>';
                        });
                    break;
                }
            }
            for(var i = 0 ;i<showAll.length;i++)
            {
                if(data.major.third == showAll[i].substring(0,2))
                {
                    $('#Major_3').html(function()
                        {
                            return '<p>'+showAll[i]+'</p>';
                        });
                    break;
                }
            }
        }
    });
}
function proceedNext(arg){
    var value = this.value ? this.value : arg;
    $('#step-' + (parseInt(value) - 1)).fadeOut();
    $('#step-' + parseInt(value)).delay(250).fadeIn(1000);

    $('#ball-' + (parseInt(value) - 1)).removeClass('active');
    $('#ball-' + parseInt(value)).addClass('active');

    if ($(window).width() >= 1200) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + 115) + 'px');
    }
    else if ($(window).width() <= 320) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + 12) + 'px');
    }
    else if ($(window).width() <= 480) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + 20) + 'px');
    }
    else if ($(window).width() <= 667) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + 50) + 'px');
    }
    else if ($(window).width() <= 750) {
        var left = parseFloat($('#ship').css('left').replace('px', ''));
        $('#ship').css('left', parseFloat(left + 60) + 'px');
    }
}
$(document).ready(function()
{
    $('#school').keyup( function()
    {

            
        $.ajax({
        'url': "https://tniworldclass.com/registration/school",
        'type': "POST",
        'dataType': "json",
        'data': {'school':$('#school').val()},
        'success': function (data) {
           var output="";
            $('#hah').html(function(){
                $round = 0;
                data.school.forEach(function(item,index)
                    {
                        if($round++ <4 )
                        output += '<div  onclick = "insertSchool(this.innerHTML)">'+item+'</div>';
                    });
                return output;
                });
            },
       
        });
    });
  
});
function insertSchool(schoolName){
    $('#school').val(schoolName);
    $('#hah').html(function(){
        return '<p> </p>';
    });
}
var IT = [
        "IT - Information Technology",
        "MT - Multimedia Techonology",
        "BI - Business Information"
        ];
var ENG = [
        "AE - Automotive Engineering",
        "EE - Electrical Engineering",
        "CE - Computer Engineering",
        "IE - Industrial Engineering",
        "PE - Production Engineering"
        ];
var BA = [
        "BJ - Business Japanese",
        "CM - Creative Marketing",
        "LM - Logistic and Supply Chain Management",
        "HR - Human Resourcing",
        "IB - International Business",
        "IM - Industrial Management",
        "AC - Accounting"
        ];
var showAll ;
var facultySelect;
function selectFaculty(value)
{
    $('#major_step').show();
    var show_major1 ="";
    $('#section').show();
    $('#question_Mt').hide();
    $('#ENG').removeClass('faculty-circle-selected');
    $('#IT').removeClass('faculty-circle-selected');
    $('#BA').removeClass('faculty-circle-selected');
    
    if(value == 1)
    {

        $('#ENG').addClass('faculty-circle-selected');

        showAll = ENG;
        facultySelect = "ENG";
    }
    else if(value == 2)
    {
        $('#IT').addClass('faculty-circle-selected');
    	facultySelect = "INT";
        showAll = IT;         
    }
    else if (value == 3)
    {
        $('#BA').addClass('faculty-circle-selected');
    	facultySelect = "BUS";
        showAll = BA;
    }
     $('#form1').html(function(){
            show_major1 += '<option value = "no">ไม่ระบุ</option>';
            for(var i = 0 ; i< showAll.length;i++)
            {
                show_major1 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
            }
            return show_major1;
        });
    var show_major2 ="";
            $('#form2').html(function(){
                show_major2 = '<option value = "no">ไม่ระบุ</option>';
                return show_major2;
            });
    var show_major3 ="";
            $('#form3').html(function(){
                show_major3 = '<option value = "no">ไม่ระบุ</option>';
                return show_major3;
            });
}
function changeMajor(value)
{
    
    if(value == 1)
    {
            $('#form3').html(function(){
        show_major3 ='<option value = "no">ไม่ระบุ</option>';
        return show_major3;
    });
    var show_major2 ="";
            $('#form2').html(function(){
                show_major2 += '<option value = "no">ไม่ระบุ</option>';
                if($('#form1').val() != "no")
                for(var i = 0 ; i < showAll.length;i++)
                {
                    if($('#form1').val() != showAll[i].substring(0,2))
                        show_major2 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
                }
                return show_major2;
            });
    }
    else if(value == 2)
    {
            var show_major3="";
            $('#form3').html(function(){
               
                show_major3 += '<option value = "no">ไม่ระบุ</option>';
                if($('#form2').val()!= "no" && $('#form1').val()!= "no")
                for(var i = 0 ; i < showAll.length;i++)
                {
                    if($('#form1').val() != showAll[i].substring(0,2) && $('#form2').val() != showAll[i].substring(0,2))
                        show_major3 += '<option value ="'+showAll[i].substring(0,2)+'">'+showAll[i]+'</option>';
                }
                
                return show_major3;
            });
        }
}
$(document).ready(function(){
	$('#finish').click(function(){
        if(confirm("ยืนยันอีกครั้ง (ไม่สามารถแก้ไขข้อมูลได้แล้ว)"))
        {
		$('#close').hide();
		$('#finish').hide();
        $('#Head').html(function(){
            return 'สมัครเสร็จสิ้น';
        });
        $('#goMain').show();
		$.ajax({
			'url' : 'https://tniworldclass.com/registration/confirm',
			'type' : "POST",
			'data':{'id':registrantID},
			'dataType' : "json"
		});
        }
	});
});
