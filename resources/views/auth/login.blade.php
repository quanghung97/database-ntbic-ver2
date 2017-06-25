<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <meta name="csrf-token" content="{{CSRF_TOKEN()}}">
    <style>
        @charset "utf-8";

        @import url

        /
        /
        maxcdn.bootstrapcdn.com /font-awesome/

        4.3
        .0
        /css/
        font-awesome.min.css

        )
        ;

        div.main {
            background: #0264d6; /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, #0264d6 1%, #1c2b5a 100%); /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%, #0264d6), color-stop(100%, #1c2b5a)); /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover, #0264d6 1%, #1c2b5a 100%); /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover, #0264d6 1%, #1c2b5a 100%); /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover, #0264d6 1%, #1c2b5a 100%); /* IE10+ */
            background: radial-gradient(ellipse at center, #0264d6 1%, #1c2b5a 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0264d6', endColorstr='#1c2b5a', GradientType=1); /* IE6-9 fallback on horizontal gradient */
            height: calc(100vh);
            width: 100%;
        }

        [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
        }

        /* ---------- GENERAL ---------- */

        * {
            box-sizing: border-box;
            margin: 0px auto;

        &
        :before,

        &
        :after {
            box-sizing: border-box;
        }

        }

        body {

            color: #606468;
            font: 87.5%/1.5em 'Open Sans', sans-serif;
            margin: 0;
        }

        a {
            color: #eee;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input {
            border: none;
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5em;
            padding: 0;
            -webkit-appearance: none;
        }

        p {
            line-height: 1.5em;
        }

        .clearfix {
            *zoom: 1;

        &
        :before,

        &
        :after {
            content: ' ';
            display: table;
        }

        &
        :after {
            clear: both;
        }

        }

        .container {
            left: 50%;
            position: fixed;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        /* ---------- LOGIN ---------- */

        #login form {
            width: 300px;
        }

        #login, .logo {
            display: inline-block;
            width: 40%;
        }

        #login {
            border-right: 1px solid #fff;
            padding: 0px 22px;
            width: 59%;
        }

        .logo {
            color: #fff;
            font-size: 50px;
            line-height: 125px;
        }

        #login form span.fa {
            background-color: #fff;
            border-radius: 3px 0px 0px 3px;
            color: #000;
            display: block;
            float: left;
            height: 50px;
            font-size: 24px;
            line-height: 50px;
            text-align: center;
            width: 50px;
        }

        #login form input {
            height: 50px;
        }

        fieldset {
            padding: 0;
            border: 0;
            margin: 0;

        }

        #login form input[type="text"], input[type="password"] {
            background-color: #fff;
            border-radius: 0px 3px 3px 0px;
            color: #000;
            margin-bottom: 1em;
            padding: 0 16px;
            width: 250px;
        }

        .form-group {
            text-align: left;
        }

        #login form input[type="submit"] {
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            background-color: #000000;
            color: #eee;
            font-weight: bold;
            /* margin-bottom: 2em; */
            text-transform: uppercase;
            padding: 5px 10px;
            height: 30px;
        }

        #login form input[type="submit"]:hover {
            background-color: #d44179;
        }

        #login > p {
            text-align: center;
        }

        #login > p span {
            padding-left: 5px;
        }

        .middle {
            display: flex;
            width: 600px;
        }

        img {
            width: 100px;
        }

        .text-error {
            color: white;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="main">


    <div class="container">
        <center>
            <div class="middle">
                <div id="login">

                    <form method="POST">

                        <fieldset class="clearfix" style="text-align: left">
                            <p class="text-error">{{$errors->first('username')}}</p>
                            <p class="text-error">{{$errors->first('password')}}</p>
                            @if(session('success'))
                                <p class="text-error">{{ session('success') }}</p>

                            @endif
                            <p><span class="fa fa-user"></span><input type="text" name="username"
                                                                      Placeholder="Tên tài khoản" required></p>
                            <!-- JS because of IE support; better: placeholder="Username" -->
                            <p><span class="fa fa-lock"></span><input type="password" name="password"
                                                                      Placeholder="Mật khẩu" required></p>
                            <!-- JS because of IE support; better: placeholder="Password" -->
                            @if($check_captcha == true)
                                <div class="form-group">
                                    <img style="margin-top: -10px; width: 78%; border: 1px solid gray"
                                         id="login_captcha" src="{{ URL::asset(Captcha::src()) }}">
                                    <i class="fa fa-refresh fa-2x"
                                       style="color:white ;padding: 10px;cursor: pointer; margin: 20px 0 0 5px;"
                                       aria-hidden="true" id="re_login_captcha"></i>
                                    <p></p>
                                    <p id="captcha_null" class="text-error">
                                        {{$errors->first('captcha')}}
                                    </p>
                                    <input id="text_captcha" type="text" class="form-control" name="captcha"
                                           placeholder="Nhập mã bảo vệ">
                                </div>
                            @endif

                            <input type="text" name="_token" value="{{CSRF_TOKEN()}}" hidden="">
                            <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text"
                                                                                                     href="{{url('quen-mat-khau')}}">Quên mật khẩu?</a></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit"
                                                                                                          value="Đăng nhập"></span>
                            </div>

                        </fieldset>
                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
                <div class="logo">
                    NTBIC
                    <div class="clearfix"></div>
                </div>

            </div>
        </center>
    </div>

</div>
<script src="{{URL::asset('public/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('public/js/admin/myscript.js')}}"></script>
</body>
</html>