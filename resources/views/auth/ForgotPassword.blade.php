<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{csrf_token()}}" />
	<title></title>
	<link href="/public/css/login.css" rel="stylesheet" type="text/css"/>
	<link href="/webarch/webarch/HTML/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	 <link href="/webarch/webarch/HTML/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet"
          type="text/css"/>
</head>
<body>
	<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="/storage/app/public/media/logo.png" />
            <form id="auth_login" method="post" class="form-signin">
                <p class="text-error">
					{{$errors->first('email')}}
				</p>
				<input type="email" id="email" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
				<div class="form-group">
					<img style="margin-top: -10px; width: 80%; border: 1px solid gray" id="login_captcha" src="{{ Captcha::src() }}">
					<i class="fa fa-refresh fa-2x" style="padding: 10px;cursor: pointer; margin: 20px 0 0 5px;" aria-hidden="true" id="re_login_captcha"></i>
					<p></p>
					<p id="captcha_null" class="text-error">
						{{$errors->first('captcha')}}
					</p>
					<input id="text_captcha" type="text" class="form-control" name="captcha" placeholder="Nhập mã bảo vệ">
				</div>

                <input name="_token" value="{{csrf_token()}}" hidden>
                <button id="dauth_login" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Gửi mật khẩu mới </button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
<script src="/public/js/lib/jquery-3.1.0.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="/public/js/my_jquery.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>

    
