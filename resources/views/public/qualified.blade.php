<!-- TNI World Class #2 -->
<!-- Organization: Thai-Nichi Institute of Technology -->

<!-- Page: Main Land -->
<!-- Author/Developer: Natthasak Vechparsit -->
<!-- Design Engineer:  Natthasak Vechprasit -->
<!-- Art Director: Yasumin Tamrareang, Thanawat Wanwarothorn -->
<!-- Graphic Art:  Yasumin Tamrareang, Amita Chalearmsuk -->

<!-- Front-End Programmer: Natthasak Vechprasit -->
<!-- Back-End Programmer: Natthasak Vechprasit, Nat Phattano -->

<!-- TangentRoute -->
<!-- For work with our team please contact us via phone, email or website below -->
<!-- Natthasak: ve.natthasak_st@tni.ac.th, tangentroute.com -->

<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>TNI World Class #2 || Thai-Nichi Institute of Technology</title>
    <meta name="description" content="โครงการที่มอบโอกาสให้นักเรียนที่มีผลการเรียนดี มีเกรดเฉลี่ยนสะสม 3.50 ขึ้นไป
    สมัครเข้าร่วม เพื่อรับทุนการศึกษา 100% พร้อมทุนแลกเปลี่ยนในต่างประเทศจาก สถาบันเทคโนโลยีไทย-ญี่ปุ่น
    สร้างโอกาสในการศึกษาต่อและรับทุนการศึกษาจากต่างประเทศในอนาคต">
    <meta name="keyword" content="TNI, TNI World Class, World Class, Camp, World Class Camp, Thai-Nichi Institute Of Technology, Sakura Camp">

    <link rel="icon" type="image/x-icon" href="https://tniworldclass.com/images/favicon.png">

    <meta property="og:title" content="TNI World Class #2">
    <meta property="og:url" content="https://tniworldclass.com">
    <meta property="og:image" content="https://tniworldclass.com/images/worldclass-banner-1200-360.jpg">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!--<link href="css/animate.css" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    -->
    <link href="css/mainland.css" rel="stylesheet">
    <link href="css/registration.css" rel="stylesheet">
    <link href="css/qualified.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
</head>

<body>

<div class="loading">
    <div class="loading-logo">
        <img id="img-status" src="images/logoWC-500px.png">
        <div id="check_dialog"><br>
            <input class="form-control" placeholder="ชื่อ" id="firstname">
            <input class="form-control" placeholder="นามสกุล" id="lastname">
            <br>
            <div style="margin-top: 10px"><button id="check">ตรวจสอบ</button></div>
        </div>
        <div id="result-status"></div>
        <br>
        <div id="result-name"></div>
        <div id="result-school"></div>
        <div id="result-faculty"></div>
    </div>
</div>

<script type="text/javascript">

$('#check').click(function(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var jsonData = {'firstname' : firstname, 'lastname' : lastname}
    $.ajax({
        type: "POST",
        url: "https://tniworldclass.com/check-qualify",
        dataType: "json",
        data: jsonData,
        success: function(result){
            console.log(result)
            $("#check_dialog").hide();
            if(result.type == 1){
                $('#img-status').fadeOut(200, function(){
                    $('#img-status').attr('src', 'https://tniworldclass.com/images/treasure_congrats.png');
                }).fadeIn(200);
                $("#result-status").html('ยินดีด้วย! คุณได้รับการคัดเลือกเข้าร่วมเป็นลูกเรือเดินทางกับเรา');
                $("#result-name").html(result.firstname + ' ' + result.lastname);
                $("#result-school").html(result.school_name);
                $("#result-faculty").html((result.faculty)? 'คณะ'+result.faculty : 'คณะเทคโนโลยีสารสนเทศ');
            }
            else if(result.type == 2){
                $("#img-status").attr('src', 'https://tniworldclass.com/images/treasure_congrats.png');
                $("#result-status").html('ใจเย็น คุณอาจได้ขึ้นเรือลำถัดไป');
                $("#result-name").html(result.firstname + ' ' + result.lastname +' (สำรอง)');
            }
            else{
                $("#img-status").attr('src', 'https://tniworldclass.com/images/treasure_bye.png');
                $("#result-status").html('อย่าเสียใจไปเลย คุณพยายามเต็มที่แล้ว');
            }
        },
        error: function(){
            $("#check_dialog").hide();
            $("#img-status").attr('src', 'https://tniworldclass.com/images/treasure_bye.png');
            $("#result-status").html('อย่าเสียใจไปเลย คุณพยายามเต็มที่แล้ว');
        }
    });
})

</script>

</body>

</html>