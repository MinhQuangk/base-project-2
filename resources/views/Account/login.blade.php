<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('font/css/login.css')}}">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Karla:wght@300&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Karla:wght@300&family=Sunshiney&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Karla:wght@300&family=Oleo+Script+Swash+Caps&family=Sunshiney&display=swap"
          rel="stylesheet"> 
</head>
<body>
<div class="container">
    <div class="title">
        <h1 id="title_fonts">Student management system</h1>
    </div>
    <div class="login">
        <div class="right_form">
            <div class="fonts">
                <h1 id="fonts">Login</h1>
            </div>
            <div class="enter_form">
                <form action="{{route('admin.login')}}" method="post">
                    @csrf
                    <input class="text" type="text" name="username" id="username" style="border: 1px solid black"
                           placeholder="username">
                    <i class="fa fa-user"></i> <br> <br>
                    @if ($errors->has('username'))
                        <strong class="text-danger" style="color: red">{{$errors->first('username')}}</strong>
                    @endif
                    <input class="text" type="password" name="password" id="pass" style="border: 1px solid black"
                           placeholder="Password" >
                     <br>
                     <br>
                    @if ($errors->has('password'))
                    <strong class="text-danger" style="color: red ;">{{$errors->first('password')}}</strong> <br>
                @endif
                    
                    <div class="save">
                        <div class="left_save">
                            <input type="checkbox" name="remember"><span id="text-save">Save Password</span>
                        </div>
                        <div class="right_forget">
                            <span id="text-login12"> <a href="" style="color: blue;">Forgot password?</a></span>
                        </div>
                    </div>
                    <br> <br>
                    <div>
                        <button  id="loginButton" type="submit">Login</button>
                    </div>
                    <br>
                    <span id="text-login">Don't have an account? <a href="{{route('admin.signUp')}}"
                                                                    style="color: blue;">Sign up</a></span>
                    <br>
                    <div class="other-login">
                        <span id="text-login1">Or Sign up Using</span>
                        <br>
                        <div class="item-login">
                            <a href="https://mail.google.com/mail/u/0/?pli=1#inbox"><img
                                    src="{{asset("font/img/Google__G__Logo.svg.png")}}"
                                    style="margin-right: 10px ;"
                                    width="35" height="35" alt=""></a>
                            <a href="https://www.facebook.com/"><img
                                    src="{{asset("font/img/fb_icon_325x325.png")}}"
                                    width="35" height="35" alt=""
                                    style="margin-right: 10px ;"></a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <div class="left_form">
            <img src="{{asset('font/img/Screenshot%202022-10-29%20201329.png')}}" style="height: 100%; width: 100%">
        </div>
    </div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="font/js/login.js"></script>
</html>