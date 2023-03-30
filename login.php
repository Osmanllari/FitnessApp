<?php

session_start();
if(!empty($_SESSION)){
    echo $_SESSION["message"];
    session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">

    <!-- <?php
    session_start();
    
    // If user already logged in, send them to index
    if ( ! empty( $_SESSION['user'] ) ) {
        header('Location:index.php');
        exit;
    }
    ?> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Workout Planner</title>      
    <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png"
    type="image/x-icon" />
        
    <style>
        body {
            margin: 0;
            color: #6a6f8c;
            background: #c8c8c8;
            font: 600 16px/18px 'Open Sans', sans-serif;
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: table
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }


        .login-wrap {
            width: 100%;
            margin: auto;
            max-width: 525px;
            min-height: 650px;
            position: relative;
            background: url(https://images.pexels.com/photos/260352/pexels-photo-260352.jpeg?cs=srgb&dl=pexels-pixabay-260352.jpg&fm=jpg) no-repeat center;
            background-size: 525px;
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
        }

        .login-html {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background: rgba(40, 57, 101, .9);
        }

        .login-html .sign-in-htm,

        .login-html .sign-up-htm {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear;
        }

        .login-html .sign-in,
        .login-html .sign-up,
        .login-form .group .check {
            display: none;
        }

        .login-html .tab,
        .login-form .group .label,
        .login-form .group .button {
            text-transform: uppercase;
        }

        .login-html .tab {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
        }

        .login-html .sign-in:checked+.tab,
        .login-html .sign-up:checked+.tab {
            color: #fff;
            border-color: #1161ee;
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            /* text-security: circle; */
            -webkit-text-security: circle;
        }

        .login-form .group .label {
            color: #aaa;
            font-size: 12px;
        }

        .login-form .group .button {
            background: #1161ee;
        }

        .login-form .group label .icon {
            width: 15px;
            height: 15px;
            border-radius: 2px;
            position: relative;
            display: inline-block;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group label .icon:before,
        .login-form .group label .icon:after {
            content: '';
            width: 10px;
            height: 2px;
            background: #fff;
            position: absolute;
            transition: all .2s ease-in-out 0s;
        }

        .login-form .group label .icon:before {
            left: 3px;
            width: 5px;
            bottom: 6px;
            transform: scale(0) rotate(0);
        }

        .login-form .group label .icon:after {
            top: 6px;
            right: 0;
            transform: scale(0) rotate(0);
        }

        .login-form .group .check:checked+label {
            color: #fff;
        }

        .login-form .group .check:checked+label .icon {
            background: #1161ee;
        }

        .login-form .group .check:checked+label .icon:before {
            transform: scale(1) rotate(45deg);
        }

        .login-form .group .check:checked+label .icon:after {
            transform: scale(1) rotate(-45deg);
        }

        .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
            transform: rotate(0);
        }

        .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
            transform: rotate(0);
        }

        hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, .2);
        }

        .foot-lnk {
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            
            <div class="login-form">
            
                <div class="sign-in-htm">
                    <form name="signInForm" action="./php/loginphp/signIn.php" method="POST" onsubmit="return checkLogIn()">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="username_li" type="text" class="input" name="user_name_li">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="userpass_li" type="password" class="input" data-type="password" name="user_password_li">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    
                    </form>
                    <hr>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                    </form>
                </div>

                <div class="sign-up-htm">
                    <form name="signUpForm" action="./php/loginphp/signUp.php" method="POST" onsubmit="return checkSignUp()">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="username_su" type="text" class="input" name="user_name_su">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="userpass_su" type="password" class="input" data-type="password" name="user_password_su">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="userpass_retype" type="password" class="input" data-type="password" name="user_pass_retype">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="user_email" type="text" class="input" name="user_email">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    </form>
                    <hr>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>

        function checkSignUp(){
            let password = document.getElementById("userpass_su").value;
            let passwordRetype = document.getElementById("userpass_retype").value;
            let username = document.getElementById("username_su").value;
            let email = document.getElementById("user_email").value;
            
            if(password == "" || passwordRetype == "" || username == "" || email == "") {
                alert("Please complete all information!");
            }
            
            if(password != passwordRetype){
                alert("Passwords do not match!");
                return false;
            }

            validatePassword(password);
        }

        function checkLogIn() {
            let password = document.getElementById("userpass_li").value;
            let username = document.getElementById("username_li").value;

            console.log("Test");

            if(password == "" || username == ""){
                alert("Please complete all information!");
            }

            validatePassword(password);
        }

        function validatePassword(password) {
            const minCharacters = 8;

            if(newPassword.length < minCharacters){
                alert("Password needs to be greater than or equal to 8 characters!");
                return false;
            }

            if(!/\d/.test(newPassword)){
                alert("Password must contain at least one number!");
                return false;
            }

            if(!/[a-zA-Z]/.test(newPassword)){
                alert("Password must contain at least one letter!");
                return false;
            }

            if(!/[@$!%#+=()\^?&]/.test(newPassword)){
                alert("Password must contain at least one special character!");
                return false;
            }

            return true;		
            }


    </script>
</body>

</html>