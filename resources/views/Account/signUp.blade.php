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
                    <input class="text" type="text" name="User" id="username" style="border: 1px solid black"
                           placeholder="Username">
                    <i class="fa fa-user"></i> <br>
                    <br>
                    <input class="text" type="password" name="Pass" id="pass" style="border: 1px solid black"
                           placeholder="Password">
                    <br><br>
                    <input class="text" type="password" name="re_Pass" id="re_pass" style="border: 1px solid black"
                           placeholder="Password">
                    <i class="fa fa-key"></i> <br> <br>
                    <input class="text" type="text" name="phone" id="phone" style="border: 1px solid black"
                           placeholder="Phone number">
                    <br><br>
                    <input class="text" type="email" name="phone" id="email" style="border: 1px solid black"
                           placeholder="Email">
                    <br><br>
                    <div class="save">
                        <div class="left_save">
                        </div>
                        <div class="right_forget">
                            <span id="text-login">Already have an account? <a href="{{Route('admin.login');}}"
                                                                            style="color: blue;">Login</a></span>
                        </div>  
                    </div>
                    <br> <br>
                    <div>
                        <button onclick="loginButton();" id="signUpButton">Sign Up</button>
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
<script src="font/login.js"></script>
</html>