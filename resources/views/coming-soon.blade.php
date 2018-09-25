<!DOCTYPE HTML>

<html>

<head>
    <title>TNI World Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <script   src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
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
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript" src="js/registration.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.next').click(nextStep);
            $('.back').click(backStep);
        });

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
            // Ajax here
            $('#step-'+(parseInt(this.value)-1)).fadeOut();
            $('#step-'+parseInt(this.value)).delay(250).fadeIn(1000);

            $('#ball-'+(parseInt(this.value)-1)).removeClass('active');
            $('#ball-'+parseInt(this.value)).addClass('active');

            if($(window).width() >= 1200){
                var left = parseFloat($('#ship').css('left').replace('px',''));
                $('#ship').css('left', parseFloat(left+115)+'px');
            }
            else if($(window).width() <= 320){
                var left = parseFloat($('#ship').css('left').replace('px',''));
                $('#ship').css('left', parseFloat(left+12)+'px');
            }
            else if($(window).width() <= 480){
                var left = parseFloat($('#ship').css('left').replace('px',''));
                $('#ship').css('left', parseFloat(left+20)+'px');
            }
            else if($(window).width() <= 667){
                var left = parseFloat($('#ship').css('left').replace('px',''));
                $('#ship').css('left', parseFloat(left+50)+'px');
            }
            else if($(window).width() <= 750){
                var left = parseFloat($('#ship').css('left').replace('px',''));
                $('#ship').css('left', parseFloat(left+60)+'px');
            }
        }
    </script>

</head>

<body>
<div id="registration-island-top" style="height: auto;">
    <img id="sky" src="images/sky.png">
    <img id="star" src="images/star.png">
    <img id="mountain" src="images/mountain.png">
    <img id="sea-wave-background" src="images/sea-bg.png" style="animation: none;">
    <img id="moon" class="animated bounceInUp" src="images/moon.png">
    <div class="island-wrapper">
        <img id="island" class="animated bounceIn" src="images/island.png">
    </div>
    <div id="ship-container"><img id="ship" src="images/ship.png" style="left: 0; right: auto; animation: none"></div>
    <img id="sea-wave" src="images/sea.png" style="animation: none;">

</div>

<div id="registration-section">

    <p>พบกันเร็วๆนี้<br>10 สิงหาคม 2559</p>

    <div class="fb-page" data-href="https://www.facebook.com/TNIWorldClass" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TNIWorldClass" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TNIWorldClass">TNI World Class</a></blockquote></div>

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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1074500879292053";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>