<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body  class="login-bg-img">
<div>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <form class="user" action="{{route('login')}}" method=" ">
                @csrf
                <div class="row form-group">
                    <i class="fas fa-user"></i>
                    <input type="text"  placeholder="Email or Phone" required name="username">
                </div>
                <div class="row form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required name="password">
                </div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
            <!-- <h4 id="wrapper-bottom"><center>MATS College of Technology</center></h4> -->
            </form>
        </div>
    </div>
</div>

    <script>
    $('document').ready(function(){
        @if($errors->any())
            $("#alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
    })

  </script>

  </body>
</html>
