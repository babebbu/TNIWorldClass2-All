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
    <title>TNI World Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="css/mainland.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
</head>

<body>
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
            <div class="menu-mobile" id="menu-mobile">
                <ul id="menu-slide">
                    <li>ติดต่อเรา</li>
                    <li>ภาพกิจกรรม</li>
                    <li>คำถามที่พบบ่อย</li>
                    <li>กำหนดการ</li>
                    <li>TNI World Class</li>
                </ul>
                <img src="images/logoWC-200px.png" class="img-logo-mobile" id="img-logo-mobile" alt="TNI World Class" onclick="showMobileMenu()">
            </div>
        </div>
        <img id="sky" src="images/bgsky_main-01.png">

        <!-- Mountain -->
        <!--<img id="mountain" src="images/moutain_main-01.png">-->
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
        <img class="compass" src="images/compass-01.png">

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

        <div class="popup popup-main" id="popup-main" onclick="toMainScreen()">
            โครงการค่าย TNI World Class เป็นโครงการที่มอบโอกาสให้นักเรียนที่มีผลการเรียนดี มีเกรดเฉลี่ยนสะสม 3.50 ขึ้นไป
            สมัครเข้าร่วมโครงการ เพื่อรับทุนการศึกษา 100% พร้อมทุนแลกเปลี่ยนในต่างประเทศจาก <u>สถาบันเทคโนโลยีไทย-ญี่ปุ่น</u>
            สร้างโอกาสในการศึกษาต่อและรับทุนการศึกษาจากต่างประเทศในอนาคต
        </div>

        <div class="popup popup-faq" id="popup-faq" onclick="toFAQScreen()">
            <p>
                Q: ค่ายนี้จัดขึ้นที่ไหน อย่างไร ?<br>
                A: ค่ายนี้จัดที่สถาบันเทคโนโลยีไทย-ญี่ปุ่น ระยะเวลา 2 วัน 1 คืน โดยที่น้องจะไม่ได้รับอนุญาตให้ออกจากบริเวณที่จัดกิจกรรม ยกเว้นในกรณีที่ติดธุระเร่งด่วน และมีผู้ปกครองมารับด้วยตนเอง
            </p>
            <p>
                Q: ภาษาที่ใช้ในการตอบคำถามต้องเป็นภาษาทางการหรือไม่ ?<br>
                A: ในการตอบคำถามขอให้สื่อสารให้พี่ๆเข้าใจและแสดงความเป็นตัวของตัวเองก็พอครับ
            </p>
        </div>

        <div class="popup popup-schedule" id="popup-schedule" onclick="toScheduleScreen()">
            กำหนดการจ้า
        </div>

        <div class="popup popup-contact" id="popup-contact" onclick="toScheduleScreen()">
            ติดต่อ<br>
            เบอร์เจ๊มิน
        </div>

    </div>
    <!--<div style="background: #37434f; height: 100px">test</div>-->
    <script src="js/mainland.js"></script>
</body>

</html>
