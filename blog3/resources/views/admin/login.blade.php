<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
{{--      <style>--}}
{{--          .yz{--}}
{{--              position: absolute;--}}
{{--              right: 0;--}}
{{--              top: 7px;--}}
{{--          }--}}
{{--      </style>--}}
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center">
                <div class="content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <form action="/login" method="post" class="form-validate mb-4">
                      {{ csrf_field() }}
                    <div class="form-group">
                      <input id="login-username" type="text" name="loginUsername" required data-msg="Please enter your username" class="input-material" >
                      <label for="login-username" class="label-material">用户名</label>
                    </div>
{{--                    <div class="form-group">--}}
{{--                      <input id="login-email" type="text" name="loginEmail" required data-msg="Please enter your email" class="input-material">--}}
{{--                      <label for="login-email" class="label-material">邮箱</label>--}}
{{--                    </div>--}}
                      <div class="form-group">
                          <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                          <label for="login-password" class="label-material">密码</label>
                      </div>
                    <button type="submit" class="btn btn-primary">登录</button>
{{--                      <a href="#" class="forgot-pass">Forgot Password?</a>--}}
                  </form><br><small>没有账号? </small><a href="/reg" class="signup">去注册</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/js/front.js"></script>
    <script>
        function getYZM(){

        }
    </script>
  </body>
</html>
