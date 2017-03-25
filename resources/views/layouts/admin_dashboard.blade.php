<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>NTBIC | Trang quản trị viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-metrojs/MetroJs.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/shape-hover/css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/shape-hover/css/component.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/owl-carousel/owl.carousel.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/owl-carousel/owl.theme.css') }}"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet"
          type="text/css"
          media="screen"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-slider/css/jquery.sidr.light.css') }}"
          rel="stylesheet"
          type="text/css" media="screen"/>
    <link rel="stylesheet"
          href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css') }}"
          type="text/css" media="screen">
    <link rel="stylesheet" href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/Mapplic/mapplic/mapplic.css') }}"
          type="text/css"
          media="screen">
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/boostrapv3/css/bootstrap.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/boostrapv3/css/bootstrap-theme.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/font-awesome/css/font-awesome.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/css/custom-icon-set.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/css/magic_space.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->
    <!-- BEGIN FORM_ELEMENT PLUGIN CSS -->
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet"
          type="text/css" media="screen"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-datepicker/css/datepicker.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/ios-switch/ios7-switch.css') }}" rel="stylesheet"
          type="text/css" media="screen">
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.css') }}" rel="stylesheet"
          type="text/css" media="screen"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css') }}"
          rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ URL::asset('public/css/admin_dashboard.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END FORM_ELEVENT PLUGIN CSS -->
    <!-- BEGIN PLUGIN GROUP_LIST CSS -->
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet"
          type="text/css" media="screen"/>
    <link href="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-nestable/jquery.nestable.css') }}"
          rel="stylesheet" type="text/css" media="screen"/>
    <!-- END PLUGIN GROUP_LIST CSS -->
    @yield('css')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation" style="">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                <li class="dropdown"><a id="main-menu-toggle" href="#main-menu" class="">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a></li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href="{{ URL::asset('quan-tri-vien') }}"><br>
                <center><p class="semi-bold" style="color: white; font-size: 14px">QUẢN TRỊ VIÊN NTBIC</p></center>
            </a>
            <!-- END LOGO -->

        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
            <!-- BEGIN TOP NAVIGATION MENU -->

            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">

                <ul class="nav quick-section ">
                    <li class="quicklinks"><a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#"
                                              id="user-options">

                            <div class="iconset top-chat-dark "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">

                            <li><a href="{{ URL::asset('quan-tri-vien/trang-ca-nhan') }}"><i class="fa fa-user"></i> Trang cá nhân</a></li>
                            <li><a href="{{ URL::asset('quan-tri-vien/trang-ca-nhan/doi-mat-khau') }}"><i class="fa fa-gear"></i> Đổi mật khẩu</a></li>
                            <li><a href="{{ URL::asset('quan-tri-vien/logout') }}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Đăng xuất</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
            <div class="user-info-wrapper">
                <center><img src="{{ URL::asset('storage/app/public/media_backup/logo.png') }}" alt=""
                             data-src="{{ URL::asset('storage/app/public/media_backup/logo.png') }}"
                             data-src-retina="{{ URL::asset('storage/app/public/media_backup/logo.png') }}"
                             width="120" height="120" style="border-radius: 120px"/></center>
                <br>

            </div>
            <!-- END MINI-PROFILE -->
            <!-- BEGIN SIDEBAR MENU -->
            <ul>
                @yield('sidebar')
            </ul>
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="content sm-gutter">
            <ul class="breadcrumb">
                <li>
                    <p>TRANG CHỦ</p>
                </li>
                <li><a href="#" class="active">@yield('name_page')</a></li>
            </ul>
            @yield('main')
        </div>
    </div>
    <!-- BEGIN CHAT -->
    <div class="chat-window-wrapper">
        <div id="main-chat-wrapper" class="inner-content">
            <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users">
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">group chats</div>
                    <div class="side-widget-content">
                        <div id="groups-list">
                            <ul class="groups">
                                <li><a href="#">
                                        <div class="status-icon green"></div>
                                        Office work</a></li>
                                <li><a href="#">
                                        <div class="status-icon green"></div>
                                        Personal vibes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="side-widget fadeIn">
                    <div class="side-widget-title">favourites</div>
                    <div id="favourites-list">
                        <div class="side-widget-content">
                            <div class="user-details-wrapper active" data-chat-status="online"
                                 data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                 data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                 data-user-name="Jane Smith">
                                <div class="user-profile">
                                    <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}" alt=""
                                         data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                         data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                         width="35"
                                         height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        Jane Smith
                                    </div>
                                    <div class="user-more">
                                        Hello you there?
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <!-- <span class="badge badge-important">3</span>-->
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon green"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-wrapper" data-chat-status="busy"
                                 data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                 data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                 data-user-name="David Nester">
                                <div class="user-profile">
                                    <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c.jpg') }}" alt=""
                                         data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c.jpg') }}"
                                         data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c2x.jpg') }}"
                                         width="35"
                                         height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        David Nester
                                    </div>
                                    <div class="user-more">
                                        Busy, Do not disturb
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon red"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">more friends</div>
                    <div class="side-widget-content" id="friends-list">
                        <div class="user-details-wrapper" data-chat-status="online"
                             data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                             data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                             data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy"
                             data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                             data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                             data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="online"
                             data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                             data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                             data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/c2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy"
                             data-chat-user-pic="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                             data-chat-user-pic-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                             data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/h2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="chat-messages-header">
                    <div class="status online"></div>
                    <span class="semi-bold">Jane Smith(Typing..)</span>
                    <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>
                </div>
                <div class="chat-messages scrollbar-dynamic clearfix">
                    <div class="inner-scroll-content clearfix">
                        <div class="sent_time">Yesterday 11:25pm</div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Hello, You there?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    How was the meeting?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}" alt=""
                                     data-src="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d.jpg') }}"
                                     data-src-retina="{{ URL::asset('webarch/webarch/HTML/assets/img/profiles/d2x.jpg') }}"
                                     width="35"
                                     height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="sent_time ">Today 11:25pm</div>
                        <div class="user-details-wrapper pull-right">
                            <div class="user-details">
                                <div class="bubble sender">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Sent On Tue, 2:45pm</div>
                        </div>
                    </div>
                </div>
                <div class="chat-input-wrapper" style="display:none">
                    <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END CHAT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->


@yield('script')
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-1.8.3.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/boostrapv3/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/breakpoints.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}"
        type="text/javascript"></script>
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script> --}}
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-lazyload/jquery.lazyload.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"
        type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-slider/jquery.sidr.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}"
type="text/javascript"></script> --}}
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js') }}"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js') }}"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') }}"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/skycons/skycons.js') }}"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/owl-carousel/owl.carousel.min.js') }}"
        type="text/javascript"></script>
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-gmap/gmaps.js') }}" type="text/javascript"></script> --}}
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/Mapplic/js/jquery.easing.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/Mapplic/js/jquery.mousewheel.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/Mapplic/js/hammer.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/Mapplic/mapplic/mapplic.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-flot/jquery.flot.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-flot/jquery.flot.resize.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-metrojs/MetroJs.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/js/tabs_accordian.js') }}" type="text/javascript"></script>
<!-- BEGIN PAGE FORM_ELEMENT LEVEL PLUGINS -->
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script>  --}}
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/ios-switch/ios7-switch.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-select2/select2.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js') }}"
        type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/dropzone/dropzone.min.js') }}"
        type="text/javascript"></script>

<!-- END PAGE FORM_ELEMENT LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN  SCROLL GRIB PAGE LEVEL JS -->
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ URL::asset('webarch/webarch/HTML/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript"></script> --}}
        <!-- END SCROLL GRIB LEVEL PLUGINS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{URL::asset('resources/views/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        entity_encoding: "raw",
        height: 200,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect',
        image_advtab: true,
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    });
</script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/js/core.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/js/chat.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('webarch/webarch/HTML/assets/js/demo.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('public/js/angular/angular.min.js') }}"></script>
<script src="{{ URL::asset('public/js/angular/my_angular.js') }}"></script>
<script src="{{ URL::asset('public/js/jquery-3.1.1.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('public/js/jquery.cookie.js') }}"></script>
<script src="{{ URL::asset('public/js/my_script.js') }}"></script> --}}


<!-- END  CORE TEMPLATE JS -->
</body>
</html>