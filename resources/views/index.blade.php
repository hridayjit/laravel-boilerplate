<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Bootstrap 3.3.6 -->
  	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/login.css">

        <!-- <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       
        <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    
    <div class="row" id="alertrow" style="display: none;">
        <div class="alert alert-danger col-lg-3 col-lg-offset-8 fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Invalid Credentials.</strong> Please try again.
        </div>
    </div>
   <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="assets/img/profile_image.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" action="{{ route('login') }}" class="ajaxform_reset_form" enctype="multipart/form-data">
					@csrf
                <!-- <form class="form-signin" id="loginform" role="form" action="index.php" method="post"> -->
                <span id="reauth-email" class="reauth-email"></span>
                <input id="username" style="margin-bottom: 5px;" type="number" class="form-control" name="username" placeholder="Phone no." value="" required autofocus>               
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <!--<a href="#" class="forgot-password">
                Forgot the password?
            </a>-->
        </div><!-- /card-container -->
    </div><!-- /container -->
    
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script> -->
	<!-- <script src="js/vendor/bootstrap.min.js"></script> -->
	<!-- <script src="js/main.js"></script> -->
	<script src="assets/js/login.js"></script>
    </body>
    <script>
        var param = "{{session('param')}}";
        window.onload = function(){
            //console.log(param);
            if(param=='0'){
                document.getElementById("alertrow").style.display="block";
            }
        };
    </script>
</html>
