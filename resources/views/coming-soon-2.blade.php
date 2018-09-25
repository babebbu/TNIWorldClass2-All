<!DOCTYPE html>
<html>
<head>
    <title>TNI World Class</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>

        @font-face{
            font-family: 'Cloud';
            font-weight: normal;
            src: url('https://tniworldclass.com/fonts/Cloud-Light.otf');
        }

        html, body {
            height: 100%;
        }

        body {
            background: #2b4256;
            color: white;
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            max-width: 100%;
        }
        .wrapper{
            padding: 10px;
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 40px;
            font-family: 'Cloud';
        }

        .blink {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            0% {opacity: 1;}
            100% { opacity: 0.0; }
        }
        h1{
            font-family: 'Cloud';
            font-size: 28px;
            padding: 0;
            margin: 0;
        }
        h2{
            font-size: 16px;
            margin: 0;
            margin-bottom: 3px;
            padding: 0;
        }
        p{
            font-size: 14px;
            padding: 0;
            margin: 0;
        }
        div{
            font-family: 'Cloud', 'Lato';
        }

    </style>
    <script type="text/javascript">
        var n = 1;
        function myKeyPress(e){
            var keynum;
            var cmdString = document.getElementById('cmdString-'+n);
            //console.log('cmdString-'+n);
            if(window.event) { // IE
                keynum = e.keyCode;
            } else if(e.which){ // Netscape/Firefox/Opera
                keynum = e.which;
            }
            if(keynum == 8) { // Backspace
                //console.log('String: ' + cmdString.innerHTML + ('(') + cmdString.innerHTML.length + (')'));
                var str = cmdString.innerHTML.substring(0, cmdString.innerHTML.length - 1);
                cmdString.innerHTML = str;
            }
            else if(keynum == 13){ // Enter
                $('#cursor-'+(n)).css('display', 'none');
                processCommand(document.getElementById('cmdString-'+n).innerHTML);
            }
            else {
                var keyOut;
                if(keynum == 189){
                    keyOut = '-'
                }
                else{
                    keyOut = String.fromCharCode(keynum);
                }
                cmdString.innerHTML += keyOut.toLowerCase();
            }

            return false;
        }
        function processCommand(cmd){
            switch (cmd) {
                case 'help' : cmdHelp(); break;
                case 'registration-date' : cmdGetRegisDate(); break;
                case 'facebook' : cmdFacebook(); break;
                case 'wtf-is-this' : cmdGetWTFDetails(); break;
                case 'exit' : append("I won't let you escape. Now, You are under controlled by Pirate. Ho Ho Ho!"); break;
                case 'quit' : append("I won't let you escape. Now, You are under controlled by Pirate. Ho Ho Ho!"); break;
                case 'eiei' : append("Inwza007"); break;
                case 'rm -rf *' : append("Eh! Don't do that"); break;
                case 'rm -rf /*' : append("Eh! Don't do that"); break;
                default : append('Invalid command');
            }
        }
        var htmlOutput;
        function append(output){
                document.getElementById('cmd').innerHTML += '<div style="padding: 10px 0;">' + output + '</div>';
            document.getElementById('cmd').innerHTML +=
                    '<div class="line">[web@tniworldclass.com]$ <span id="cmdString-'+(++n)+'"></span><span id="cursor-'+(n)+'" class="blink">_</span></div>';
        }
        function cmdHelp(){
            htmlOutput = '<table border="0">' +
                    '<tr><td>registration-date</td> <td>=> Ask for date of registration period</td></tr>' +
                    '<tr><td>facebook</td> <td>=> Show link to Facebook page</td></tr>' +
                    '<tr><td>wtf-is-this</td> <td>=> What is TNI World Class</td></tr>' +
                    '<tr><td>exit</td> <td>=> Close this page</td></tr>' +
                    '</table>';
            append(htmlOutput);
        }
        function cmdGetRegisDate(){
            append('August 10, 2016');
        }
        function cmdFacebook(){
            append('<a target="_blank" href="https://fb.me/TNIWorldClass" style="color: white; text-decoration: underline;">fb.me/TNIWorldClass</a>');
        }
        function cmdGetWTFDetails() {
            append('โครงการค่าย <b>TNI World Class</b> เป็นโครงการที่มอบโอกาสให้นักเรียนที่มีผลการเรียนดี มีเกรดเฉลี่ยนสะสม 3.50 ขึ้นไป <br>' +
                    'สมัครเข้าร่วมโครงการ เพื่อรับทุนการศึกษา 100% พร้อมทุนแลกเปลี่ยนในต่างประเทศจาก <b><u>สถาบันเทคโนโลยีไทย-ญี่ปุ่น</u></b> <br>' +
                    'สร้างโอกาสในการศึกษาต่อและรับทุนการศึกษาจากต่างประเทศในอนาคต');
        }
    </script>
    <script   src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/0.10.12/js/jquery.terminal.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/0.10.12/css/jquery.terminal.min.css" rel="stylesheet"/>


</head>
<body onkeydown="myKeyPress(event)">
<div class="wrapper" id="cmd" style="/*position: absolute; top: 0; padding: 10px;*/">
    <h1>TNI World Class 2</h1>
    <div>==================================</div>
    <p style="margin-bottom: 3px;"><b>[ Mode ]</b>&nbsp; Coming Soon...</p>
    <h2>Type <b></b><u>help</u></b> for list all commands</h2>
    <div>==================================</div>
    <div class="line">[web@tniworldclass.com]$ <span id="cmdString-1"></span><span id="cursor-1" class="blink">_</span></div>
</div>
    <!--<div class="container">
        <div class="content">
            <div class="title">TNI World Class</div>
            <div class=""><br><small>August 10, 2016</small></div>
        </div>
    </div>-->
<script type="text/javascript">
    // Prevent the backspace key from navigating back.
    $(document).on("keydown", function (e) {
        if (e.which === 8 && !$(e.target).is("input, textarea")) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
