<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TNI World Class - Back Office</title>
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="msapplication-TileImage" content="{{ URL::to('/public/assets') }}/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="{{ URL::to('/public/assets') }}/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/assets') }}/img/favicon/apple-touch-icon-180x180.png">-->
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="{{ URL::to('/public/assets') }}/img/favicon/manifest.json">
    <link rel="shortcut icon" href="{{ URL::to('/public/assets') }}/img/favicon/favicon.ico">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>  <![endif]-->
    <link href="{{ URL::to('/assets') }}/css/vendors.min.css" rel="stylesheet">
    <link href="{{ URL::to('/assets') }}/css/styles.min.css" rel="stylesheet">
    <link href="{{ URL::to('/assets') }}/css/login.css" rel="stylesheet">
    <script charset="utf-8" src="//maps.google.com/maps/api/js?sensor=true"></script>
  </head>
  <body class="page-login" init-ripples="">
    <div class="center">
      <div class="card bordered z-depth-2" style="margin:0% auto; max-width:400px;">
        <!-- BEGIN FORM -->
        <form class="form-floating" role="form" method="POST" action="{{ url('/admin/login') }}">
          <div class="card-header">
            <div class="brand-logo">
              <div id="logo">
                <img src="{{ URL::to('/assets') }}/img/logo.png" style="height: 100%;">
              </div>
            </div>
          </div>
          <div class="card-content">
            <div class="m-b-30">
              <div class="card-title strong pink-text text-center">Back Office Authorization</div>
              <p class="card-title-desc text-center"> Please verify your identification in order to access! </p>
            </div>
              {!! csrf_field() !!}
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="inputEmail" class="control-label">Username</label>
                <input type="text" class="form-control" name="username">
                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="inputPassword" class="control-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
          </div>
          <div class="card-action clearfix">
            <div class="pull-right">
              <!--<button type="button" class="btn btn-link white-text">Forgot password</button>-->
              <button type="submit" class="btn btn-link white-text">Login</button>
            </div>
          </div>
          </form>
        <!-- END FORM -->
      </div>
    </div>
    <script charset="utf-8" src="{{ URL::to('/assets') }}/js/vendors.min.js"></script>
    <script charset="utf-8" src="{{ URL::to('/assets') }}/js/app.min.js"></script>
  </body>
</html>