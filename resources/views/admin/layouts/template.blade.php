<?php
$staff_fb = DB::table('staffs')
        ->join('facebook_staffs', 'staffs.facebook_id', '=', 'facebook_staffs.facebook_id')
        ->select('facebook_staffs.avatar')
        ->where('staffs.student_id', '=', Auth::guard('admin')->user()->student_id )
        ->get()[0];
?>

<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>TNIWorldClass - @yield('title')</title>

    <meta name="description" content="OneUI - Admin Dashboard Template & UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ URL::to('/assets') }}/images/favicons/favicon.png">

    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/images/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="{{ URL::to('/assets') }}/images/favicons/favicon-192x192.png" sizes="192x192">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/assets') }}/images/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Web fonts -->
    <link rel="stylesheet" href="">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::to('/assets') }}/js/plugins/slick/slick.min.css">
    <link rel="stylesheet" href="{{ URL::to('/assets') }}/js/plugins/slick/slick-theme.min.css">

    <!-- OneUI CSS framework -->
    <link rel="stylesheet" id="css-main" href="{{ URL::to('/assets') }}/css/oneui.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" id="css-main" href="{{ URL::to('/assets') }}/css/style.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ URL::to('/assets') }}/css/themes/flat.min.css"> -->
    <style type="text/css" media="print">
        body{display:none;visibility:hidden;}
    </style>
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<!--
    Available Classes:

    'sidebar-l'                  Left Sidebar and right Side Overlay
    'sidebar-r'                  Right Sidebar and left Side Overlay
    'sidebar-mini'               Mini hoverable Sidebar (> 991px)
    'sidebar-o'                  Visible Sidebar by default (> 991px)
    'sidebar-o-xs'               Visible Sidebar by default (< 992px)

    'side-overlay-hover'         Hoverable Side Overlay (> 991px)
    'side-overlay-o'             Visible Side Overlay by default (> 991px)

    'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

    'header-navbar-fixed'        Enables fixed header
-->
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Overlay Scroll Container -->
        <div id="side-overlay-scroll">
            <!-- Side Header -->
            <div class="side-header side-content">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times"></i>
                </button>
                        <span>
                            <img class="img-avatar img-avatar32" src="{{ URL::to('/assets') }}/images/avatars/avatar10.jpg" alt="">
                            <span class="font-w600 push-10-l">Roger Hart</span>
                        </span>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content remove-padding-t">
                <!-- Notifications -->
                <div class="block pull-r-l">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Recent Activity</h3>
                    </div>
                    <div class="block-content">
                        <!-- Activity List -->
                        <ul class="list list-activity">
                            <li>
                                <i class="si si-wallet text-success"></i>
                                <div class="font-w600">New sale ($15)</div>
                                <div><a href="javascript:void(0)">Admin Template</a></div>
                                <div><small class="text-muted">3 min ago</small></div>
                            </li>
                            <li>
                                <i class="si si-pencil text-info"></i>
                                <div class="font-w600">You edited the file</div>
                                <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                                <div><small class="text-muted">15 min ago</small></div>
                            </li>
                            <li>
                                <i class="si si-close text-danger"></i>
                                <div class="font-w600">Project deleted</div>
                                <div><a href="javascript:void(0)">Line Icon Set</a></div>
                                <div><small class="text-muted">4 hours ago</small></div>
                            </li>
                            <li>
                                <i class="si si-wrench text-warning"></i>
                                <div class="font-w600">Core v2.5 is available</div>
                                <div><a href="javascript:void(0)">Update now</a></div>
                                <div><small class="text-muted">6 hours ago</small></div>
                            </li>
                        </ul>
                        <div class="text-center">
                            <small><a href="javascript:void(0)">Load More..</a></small>
                        </div>
                        <!-- END Activity List -->
                    </div>
                </div>
                <!-- END Notifications -->

                <!-- Online Friends -->
                <div class="block pull-r-l">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Online Friends</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- Users Navigation -->
                        <ul class="nav-users">
                            <li>
                                <a href="base_pages_profile.html">
                                    <img class="img-avatar" src="{{ URL::to('/assets') }}/images/avatars/avatar4.jpg" alt="">
                                    <i class="fa fa-circle text-success"></i> Rebecca Gray
                                    <div class="font-w400 text-muted"><small>Copywriter</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.html">
                                    <img class="img-avatar" src="{{ URL::to('/assets') }}/images/avatars/avatar10.jpg" alt="">
                                    <i class="fa fa-circle text-success"></i> Dennis Ross
                                    <div class="font-w400 text-muted"><small>Web Developer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.html">
                                    <img class="img-avatar" src="{{ URL::to('/assets') }}/images/avatars/avatar6.jpg" alt="">
                                    <i class="fa fa-circle text-success"></i> Denise Watson
                                    <div class="font-w400 text-muted"><small>Web Designer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.html">
                                    <img class="img-avatar" src="{{ URL::to('/assets') }}/images/avatars/avatar1.jpg" alt="">
                                    <i class="fa fa-circle text-warning"></i> Denise Watson
                                    <div class="font-w400 text-muted"><small>Photographer</small></div>
                                </a>
                            </li>
                            <li>
                                <a href="base_pages_profile.html">
                                    <img class="img-avatar" src="{{ URL::to('/assets') }}/images/avatars/avatar10.jpg" alt="">
                                    <i class="fa fa-circle text-warning"></i> John Parker
                                    <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                                </a>
                            </li>
                        </ul>
                        <!-- END Users Navigation -->
                    </div>
                </div>
                <!-- END Online Friends -->

                <!-- Quick Settings -->
                <div class="block pull-r-l">
                    <div class="block-header bg-gray-lighter">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Quick Settings</h3>
                    </div>
                    <div class="block-content">
                        <!-- Quick Settings Form -->
                        <form class="form-bordered" action="/admin" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Online Status</div>
                                        <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Auto Updates</div>
                                        <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Notifications</div>
                                        <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">API Access</div>
                                        <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Quick Settings Form -->
                    </div>
                </div>
                <!-- END Quick Settings -->
            </div>
            <!-- END Side Content -->
        </div>
        <!-- END Side Overlay Scroll Container -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="side-header side-content bg-white-op">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times"></i>
                    </button>
                    <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                    <div class="btn-group pull-right">
                        <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                            <i class="si si-drop"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                            <li>
                                <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="{{ URL::to('/assets') }}/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="{{ URL::to('/assets') }}/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="{{ URL::to('/assets') }}/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="{{ URL::to('/assets') }}/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="theme" data-theme="{{ URL::to('/assets') }}/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                    <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="h5 text-white" href="/">
                        <span class="h4 font-w600 sidebar-mini-hide">TNIWorldClass</span>
                    </a>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="side-content">
                    <ul class="nav-main">
                        <li>
                            <a class="active" href="/admin"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                        </li>
                        <!-- Registration -->
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">Registration</span></li>
                        <!-- Registration/Registrant -->
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Registrants</span></a>
                            <ul>
                                <li>
                                    <a href="/admin/registrants">List all registrants</a>
                                </li>
                                <li>
                                    <a href="#">Search registrants</a>
                                </li>
                                <li>
                                    <a href="/admin/registrants/grade/faculty">Grade registrants (Faculty)</a>
                                </li>
                                <li>
                                    <a href="/admin/registrants/grade/emo">Grade registrants (EMO)</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Qualifies -->
                        <a class="" href="/admin/qualifies"><i class="fa fa-check"></i>Qualifies</a>
                        <!-- Registration/Staff -->
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-graduation-cap"></i><span class="sidebar-mini-hide">Staffs</span></a>
                            <ul>
                                <li>
                                    <a href="/admin/staffs">List all staffs</a>
                                </li>
                                <li>
                                    <a href="/admin/staffs/department">View Department</a>
                                </li>
                                <li>
                                    <a href="#">Search staffs</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Protected Area -->
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">Data Analysis</span></li>
                        <li>
                            <a href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Summary</span></a>
                            <a href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Gallery</span></a>
                        </li>
                        <!-- System Settings -->
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">System Settings</span></li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Access Controls</span></a>
                            <ul>
                                <li>
                                    <a href="#">Administrators</a>
                                </li>
                                <li>
                                    <a href="#">Registration Officers</a>
                                </li>
                                <li>
                                    <a href="#">Grade Representatives</a>
                                </li>
                                <li>
                                    <a href="#">Data Analysts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Global Settings</span></a>
                            <ul>
                                <li>
                                    <a href="#">Maintenance Mode</a>
                                </li>
                                <li>
                                    <a href="#">General Configuration</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Side Content -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="header-navbar" class="content-mini content-mini-full">
        <!-- Header Navigation Right -->
        <ul class="nav-header pull-right">
            <li>
                <div class="btn-group">
                    <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                        <img src="{{ $staff_fb->avatar }}" alt="Avatar">
                        {{ Auth::guard('admin')->user()->username }} <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Profile</li>
                        <li>
                            <a tabindex="-1" href="base_pages_inbox.html">
                                <i class="si si-envelope-open pull-right"></i>
                                <span class="badge badge-primary pull-right">3</span>Inbox
                            </a>
                        </li>
                        <li>
                            <a tabindex="-1" href="base_pages_profile.html">
                                <i class="si si-user pull-right"></i>
                                <span class="badge badge-success pull-right">1</span>Profile
                            </a>
                        </li>
                        <li>
                            <a tabindex="-1" href="javascript:void(0)">
                                <i class="si si-settings pull-right"></i>Settings
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Actions</li>
                        <li>
                            <a tabindex="-1" href="base_pages_lock.html">
                                <i class="si si-lock pull-right"></i>Lock Account
                            </a>
                        </li>
                        <li>
                            <a tabindex="-1" href="base_pages_login.html">
                                <i class="si si-logout pull-right"></i>Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                    <i class="fa fa-tasks"></i>
                </button>
            </li>
        </ul>
        <!-- END Header Navigation Right -->

        <!-- Header Navigation Left -->
        <ul class="nav-header pull-left">
            <li class="hidden-md hidden-lg">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                    <i class="fa fa-navicon"></i>
                </button>
            </li>
            <li class="hidden-xs hidden-sm">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
            </li>
            <li>
                <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                <!--<button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                    <i class="si si-grid"></i>
                </button>-->
            </li>
            <li class="visible-xs">
                <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </li>
            <li class="js-header-search header-search">
                <form class="form-horizontal" action="base_pages_search.html" method="post">
                    <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                        <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                        <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                    </div>
                </form>
            </li>
        </ul>
        <!-- END Header Navigation Left -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
        <div class="pull-right">
            Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://tangentroute.com" target="_blank">TangentRoute</a>, Farality
        </div>
        <div class="pull-left">
            &copy; <?php echo date('Y'); ?> <a class="font-w600" href="javascript:void(0)" target="_blank">TNIWorldClass</a>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps Block -->
            <div class="block block-themed block-transparent">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Apps</h3>
                </div>
                <div class="block-content">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="/admin">
                                <div class="block-content text-white bg-default">
                                    <i class="si si-speedometer fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Backend</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="frontend_home.html">
                                <div class="block-content text-white bg-modern">
                                    <i class="si si-rocket fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Frontend</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Block -->
        </div>
    </div>
</div>
<!-- END Apps Modal -->

<!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="{{ URL::to('/assets') }}/js/core/jquery.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/jquery.slimscroll.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/jquery.scrollLock.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/jquery.appear.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/jquery.countTo.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/jquery.placeholder.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/core/js.cookie.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/app.js"></script>

<!-- Page JS Plugins -->
<script src="{{ URL::to('/assets') }}/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/chartjs/Chart.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/flot/jquery.flot.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="{{ URL::to('/assets') }}/js/plugins/flot/jquery.flot.resize.min.js"></script>

<!-- Page JS Code -->
<script src="{{ URL::to('/assets') }}/js/pages/base_comp_charts.js"></script>
<script>
    $(function () {
        // Init page helpers (Easy Pie Chart plugin)
        App.initHelpers('easy-pie-chart');
    });
</script>

<!-- Page JS Code -->
@yield('page-script')

<script>
    $(function () {
        // Init page helpers (Slick Slider plugin)
        // App.initHelpers('slick');
    });
</script>
</body>
</html>