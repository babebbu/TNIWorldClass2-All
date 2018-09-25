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
    <link href="css/mainland.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
</head>

<body>

<div class="loading">
    <div class="loading-logo">
        <img src="images/logoWC-500px.png">
    </div>
</div>

<div class="screen">
    <div class="menu">
        <div class="menu-center">
            <ul id="menu">
                <a href="#" onclick="toGalleryScreen()"><li id="menu-gallery" class="menu-items">ภาพกิจกรรม</li></a>
                <a href="#" onclick="toScheduleScreen()"><li id="menu-schedule" class="menu-items">กำหนดการ</li></a>
                <a href="#" onclick="toMainScreen()"><li id="menu-main" class="menu-items menu-logo">
                        <img src="images/logoWC-200px.png" class="img-logo" alt="TNI World Class">
                    </li></a>
                <a href="#" onclick="toFAQScreen()"><li id="menu-faq" class="menu-items">คำถามที่พบบ่อย</li></a>
                <a href="#" onclick="toContactScreen()"><li id="menu-contact" class="menu-items">ติดต่อเรา</li></a>
            </ul>
        </div>
        <div class="menu-mobile animated fadeInDown" id="menu-mobile">
            <ul id="menu-slide">
                <li onclick="toGalleryScreen()">ภาพกิจกรรม</li>
                <li onclick="toScheduleScreen()">กำหนดการ</li>
                <li onclick="toMainScreen()">TNI World Class</li>
                <li onclick="toFAQScreen()">คำถามที่พบบ่อย</li>
                <li onclick="toContactScreen()">ติดต่อเรา</li>
            </ul>
            <img src="images/logoWC-200px.png" class="img-logo-mobile" id="img-logo-mobile" alt="TNI World Class" onclick="showMobileMenu()">
        </div>
    </div>
    <img id="sky" src="images/bgsky_main-01.png">

    <!-- Mountain -->
    <img id="mountain-back" src="images/moutainback-02.png">
    <img id="mountain" src="images/moutainfront-02.png">

    <img class="cloud cloud-static-left" src="images/L_cloud-01.png">
    <img class="cloud cloud-static-right" src="images/R_cloud-01.png">
    <img class="cloud cloud-left cloud-animation" src="images/cloud-01.png">
    <img class="cloud cloud-right cloud-animation" src="images/cloud-01.png">

    <!-- Ship -->
    <img id="ship" src="images/ship.png">

    <!-- Ocean -->
    <img id="ocean" src="images/wave-02.png">

    <!-- Light -->
    <img class="screen-light screen-light-left" src="images/main_lightL-01.png">
    <img class="screen-light screen-light-right" src="images/main_lightR-01.png">

    <!-- Compass -->
    <!--<img class="compass" src="images/compass-01.png">-->

    <!-- Island: Gallery -->
    <img class="island island-gallery" id="island-gallery" src="images/gallery2-02.png" onclick="toGalleryScreen()">

    <!-- Island: Schedule -->
    <img class="island island-schedule" id="island-schedule" src="images/timeline-04.png" onclick="toScheduleScreen()">

    <!-- Island: FAQ -->
    <img class="island island-faq" id="island-faq" src="images/FAQ2-01.png" onclick="toFAQScreen()">

    <!-- Island: Contact -->
    <img class="island island-contact" id="island-contact" src="images/contact-05.png" onclick="toContactScreen()">

    <!-- Island: Main -->
    <img class="island island-main" id="island-main" src="images/island_main-03.png" onclick="wtfIsThis(true)">

    <!-- Register Button -->
    <a href="#">
        <div id="register" class="animated fadeInUp">
            <small>Bon Voyage</small>
        </div>
    </a>

    <!-- Popup: Main -->
    <div class="popup popup-main" id="popup-main" onclick="toMainScreen()">
        โครงการค่าย TNI World Class ครั้งที่ 2 เป็นโครงการค่ายต่อเนื่องที่มอบโอกาสให้กับนักเรียนระดับชั้นมัธยมศึกษาปีที่ 6 ที่มีเกรดเฉลี่ยสะสม 3.50 ขึ้นไป สมัครเข้าร่วมโครงการ เพื่อมีโอกาสได้รับทุนการศึกษา ได้รับการยกเว้นค่าหน่วยกิต 100% พร้อมเงินสนับสนุนไปแลกเปลี่ยนที่ประเทศญี่ปุ่นจาก <u>สถาบันเทคโนโลยีไทย-ญี่ปุ่น</u> อีกด้วย
    </div>

    <!-- Popup: FAQ -->
    <div class="popup popup-faq" id="popup-faq" onclick="toFAQScreen()">
        <p>
            <b>Q: ทุน TNI World Class คืออะไร</b><br>
            <small>A: ทุนการศึกษาประเภทให้เปล่าไม่มีข้อผูกมัดใดๆ ในการใช้คืนทุนให้กับสถาบันฯ ได้รับการยกเว้นค่าหน่วยกิต 100 % และมีเงินสนับสนุนให้ไปแลกเปลี่ยนในโรงเรียนสอนภาษาและเรียนในมหาวิทยาลัยที่ประเทศญี่ปุ่น จำนวน 120,000 บาท (ปีละ 30,000 บาท) มีจำนวน 6 ทุน</small>
        </p>
        <hr>
        <p>
            <b>Q: ทำอย่างไรถึงจะได้ทุน TNI World Class</b><br>
            <small>A: ผู้สมัครจะต้องมีคะแนน GPAX (4 ภาคการศึกษา) 3.50 ขึ้นไป และต้องมาเข้าค่าย TNI World Class ณ สถาบันเทคโนโลยีไทย-ญี่ปุ่น ตามที่กำหนด สอบชิงทุนและมาสอบสัมภาษณ์ตามประกาศรายชื่อ</small>
        </p>
        <hr>
        <p>
            <b>Q: ค่ายนี้จัดขึ้นที่ไหน อย่างไร ?</b><br>
            <small>A: ค่ายนี้จัดที่สถาบันเทคโนโลยีไทย-ญี่ปุ่น ระยะเวลา 2 วัน 1 คืน โดยที่น้องจะไม่ได้รับอนุญาตให้ออกจากบริเวณที่จัดกิจกรรม ยกเว้นในกรณีที่ติดธุระเร่งด่วน และมีผู้ปกครองมารับด้วยตนเอง</small>
        </p>
        <hr>
        <p>
            <b>Q: ภาษาที่ใช้ในการตอบคำถามต้องเป็นภาษาทางการหรือไม่ ?</b><br>
            <small>A: ในการตอบคำถามขอให้สื่อสารให้พี่ๆเข้าใจและแสดงความเป็นตัวของตัวเองก็พอครับ</small>
        </p>
        <hr>
        <p>
            <b>Q: มีค่าใช้จ่ายหรือไม่ ?</b><br>
            <small>A: ค่ายนี้ฟรีตลอดทั้งค่าย และยังมีโอกาสชิงทุนการศึกษา 100% พร้อมเงินสนับสนุนไปแลกเปลี่ยนที่ประเทศญี่ปุ่นอีกด้วย</small>
        </p>
        <hr>
        <p>
            <b>Q: จำเป็นต้องมีความรู้เนื้อหาการเรียนในวิชาคณะ และภาษาญี่ปุ่นก่อนมาเข้าค่ายหรือไม่ ?</b><br>
            <small>A: ไม่จำเป็น เพราะค่ายจะเน้นกิจกรรมของคณะที่น้องๆสนใจ กิจกรรมนันทนาการ และการแนะแนวจากรุ่นพี่ที่จบไปแล้วจากแต่ละคณะครับ</small>
        </p>
    </div>

    <!-- Popup: Schedule -->
    <div class="popup popup-schedule" id="popup-schedule" onclick="toScheduleScreen()">
        <table border="0" style="margin: auto;">
            <tr>
                <td>10 สิงหาคม 2559&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>เปิดรับสมัคร</td>
            </tr>
            <tr>
                <td>16 กันยายน 2559&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>ปิดรับสมัคร</td>
            </tr>
            <tr>
                <td>23 กันยายน 2559&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>ประกาศผล</td>
            </tr>
            <tr>
                <td>6-7 ตุลาคม 2559&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>วันค่าย</td>
            </tr>
        </table>
    </div>

    <div class="popup popup-contact" id="popup-contact" onclick="toContactScreen()">
        <table border="0" style="margin: auto;">
            <tr>
                <td>พี่มิน&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>098-268-8409</td>
            </tr>
            <tr>
                <td>พี่ต้น&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>087-298-4294</td>
            </tr>
            <tr>
                <td>Facebook&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><a href="https://fb.me/TNIWorldClass" target="_blank">TNI World Class</a></td>
            </tr>
        </table>
    </div>

    <div id="gallery-screen">
        <div id="gallery-container">
            <div id="gallery-stage">
                <img id="gallery-image-large" src="images/gallery/12032699_10204773246361955_5607212011695757930_o.jpg">
                <img id="gallery-previous" src="images/arrow.svg">
                <img id="gallery-next" src="images/arrow.svg">
                <img id="gallery-close" src="images/close-button.png">
            </div>
            <div id="gallery-images">
                <img id="gallery-image-1" src="images/gallery/12032699_10204773246361955_5607212011695757930_o.jpg">
                <img id="gallery-image-2" src="images/gallery/905897_10204773231121574_7779926233108606197_o.jpg">
                <img id="gallery-image-3" src="images/gallery/12010483_10204773249882043_4862925072061381567_o.jpg">
                <img id="gallery-image-4" src="images/gallery/12027327_10204773250882068_8365635792323514240_o.jpg">
                <img id="gallery-image-5" src="images/gallery/firstday.jpg">
                <img id="gallery-image-6" src="images/gallery/12038576_10204773292803116_7689360098905615695_o.jpg">
                <img id="gallery-image-7" src="images/gallery/12038905_10204773291443082_6078898074251767716_o.jpg">
                <img id="gallery-image-8" src="images/gallery/12087111_10204773311563585_8301446026733367700_o.jpg">
                <img id="gallery-image-9" src="images/gallery/12095098_10204773313243627_3788873091898107243_o.jpg">
                <img id="gallery-image-10" src="images/gallery/12141136_10204773297083223_1303895555926785543_o.jpg">
                <img id="gallery-image-11" src="images/gallery/robot.jpg">
                <img id="gallery-image-12" src="images/gallery/12141146_10204773302523359_693049837918632430_o.jpg">
                <img id="gallery-image-13" src="images/gallery/11237579_10204773302763365_1438584774998611620_o.jpg">
                <img id="gallery-image-14" src="images/gallery/12022365_10204773298603261_1130610577510952778_o.jpg">
                <img id="gallery-image-15" src="images/gallery/12087167_10204773334844167_2453216958278234433_o.jpg">
                <img id="gallery-image-16" src="images/gallery/12087914_10204773342724364_735045787705113571_o.jpg">
                <img id="gallery-image-17" src="images/gallery/11051872_10204122125448129_6898007385346883575_o.jpg">
                <img id="gallery-image-18" src="images/gallery/10014755_10204773341404331_5257243196026649873_o.jpg">
                <img id="gallery-image-19" src="images/gallery/12140017_10204773348764515_9076938540607425880_o.jpg">
                <img id="gallery-image-20" src="images/gallery/12017541_10204773356564710_486005360138361127_o.jpg">
                <img id="gallery-image-21" src="images/gallery/12045721_10204773321483833_437608965144048579_o.jpg">
                <img id="gallery-image-22" src="images/gallery/12095322_10204122300092495_6949681422233684369_o.jpg">
                <img id="gallery-image-23" src="images/gallery/12034459_10204773379565285_5760872438708212088_o.jpg">
                <img id="gallery-image-24" src="images/gallery/12186739_10204122297212423_3570913518104383613_o.jpg">
                <img id="gallery-image-25" src="images/gallery/12189258_10204122303212573_1278518971348370115_o.jpg">
                <img id="gallery-image-26" src="images/gallery/12187957_10204122275531881_5514770207675473555_o.jpg">
                <img id="gallery-image-27" src="images/gallery/12185237_10204122231210773_6772304397052153302_o.jpg">
            </div>
        </div>
    </div>

</div>
<script src="js/mainland.js"></script>
</body>

</html>
