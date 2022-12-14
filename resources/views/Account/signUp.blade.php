<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{asset("font/css/signUp.css")}}">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Karla:wght@300&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Karla:wght@300&family=Sunshiney&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Karla:wght@300&family=Oleo+Script+Swash+Caps&family=Sunshiney&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    
<div class="container">
    <div class="title">
        <h1 id="title_fonts">Student management system</h1>
    </div>
    <div class="login">
        <div class="right_form">
            <div class="fonts">
                <h1 id="fonts">Sign Up</h1>
            </div>
            <div class="enter_form">
                
                <form action="" method="post">
                    @csrf
                    <input class="text" type="text" name="username" id="username" style="border: 1px solid black"
                           placeholder="Username">
                    <i class="fa fa-user"></i> <br>
                    <br>
                    @if ($errors->has('username'))
                        <strong class="text-danger" style="color: red">{{$errors->first('username')}}</strong>
                    @endif
                    <input class="text" type="password" name="password" id="pass" style="border: 1px solid black"
                           placeholder="Password">
                    <br><br>
                    @if ($errors->has('password'))
                        <strong class="text-danger" style="color: red">{{$errors->first('password')}}</strong>
                    @endif
                    <input class="text" type="text" name="phone" id="phone" style="border: 1px solid black"
                           placeholder="Phone number">
                    <br><br>
                    @if ($errors->has('phone'))
                        <strong class="text-danger" style="color: red">{{$errors->first('phone')}}</strong>
                    @endif
                    <input class="text" type="email" name="email" id="email" style="border: 1px solid black"
                           placeholder="Email">
                    <br><br>
                    @if ($errors->has('email'))
                        <strong class="text-danger" style="color: red">{{$errors->first('email')}}</strong>
                    @endif
                    <div class="save">
                        <div class="left_save">
                        </div>
                        <div class="right_forget">
                            <span id="text-login">Already have an account? <a href="{{Route('account.showLogin');}}"
                                                                            style="color: blue;">Login</a></span>
                        </div>  
                    </div>
                    <br> <br>
                    <div>
                        <button onclick="loginButton();" id="signUpButton" name="btn_login">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="left_form">
            <img src="{{asset('font/img/Screenshot%202022-10-29%20201329.png')}}" style="height: 100%; width: 100%">
        </div>
    </div>
</div>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body> 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="font/login.js"></script>

</html>