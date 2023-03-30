<?php
session_start();

    include("php/loginphp/connection.php");
    include("php/loginphp/functions.php");

    check_login($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Planner</title>

    <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png"
        type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="./css/nav_style.css">
    

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: url(./images/bg.jpg);
            background-size: cover;
            background-position: center center;
            color: white;
            padding: 0;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 25%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
            background-color: white;
            color: black;
            height: 275px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            /* background-color: #474e5d; */
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        .email {
            width: 5%;
            margin-right: 10px;
        }

        h1{
            font-size: 4em;
        }
        h2.name{
            padding-top: 15px;
        }

        /* Move the email details a bit lower */
        .text1, .text2, .text3, .text4{
            padding-bottom: 5%;
        }
        /* .text2, .text4{
            padding-bottom: 5%;
        } */

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }

        .topnav a {
            height:50px;
        }

    </style>
</head>

<body>

    <div class="topnav">
        <a href="index.php">Index</a>

        <div class="dropdown">
            <button class="dropbutton"><a href="searchEngine.php">Search</a>
            </button>
        </div>

        <div class="dropdown">
            <button class="dropbutton"><a href="chooseWorkout.php">Workouts</a>
            </button>
        </div>

        <div class="dropdown">
            <button class="dropbutton"><a href="profile.php">Profile</a>
            </button>
        </div>

        <div class="dropdown">
            <button class="dropbutton"><a href="thessmap.php">Map</a>
            </button>
        </div>

        <div class="dropdown">
            <button class="dropbutton"><a href="aboutus.php">About Us</a>
            </button>
        </div>

        <div class="logoImage">
            <img src="./images/Logo-White.png" class="logo">
        </div>

        <div class="loginOption" >
            <form name="logout" class="logoutForm" action="php/loginphp/logout.php" method="POST">
                <input type="submit" class="button" value="Log Out">
            </form>
        </div>
    </div>

    <div class="about-section">
        <h1>About Us Page</h1>
        <p>Meet the developers behind the Workout Planner app!</p>
        <p>They're passionate about learning and finding interesting solutions to difficult problems.</p>
    </div>



    <h2>Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <div class="container">
                    <h2 class="name">Tron Baraku</h2>
                    <p class="title">Web Developer</p>
                    <p class="text1">I am ambitious and driven. I thrive on challenges and constantly set goals for myself, so I have something to strive toward.</p>
                    <p><img class="email" src="./images/email.png">tbaraku@citycollege.sheffield.eu</p>
                    <p>
                        <a href="mailto:tbaraku@citycollege.sheffield.eu">
                            <button class="button">Contact</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="container">
                    <h2 class="name">Marino Osmanllari</h2>
                    <p class="title">Web Developer</p>
                    <p class="text2">I am passionate about my work. Because I love what I do, I have a steady source of motivation that drives me to do my personal best.</p>
                    <p><img class="email" src="./images/email.png">mosmanllari@citycollege.sheffield.eu</p>
                    <p>
                        <a href="mailto:mosmanllari@citycollege.sheffield.eu">
                            <button class="button">Contact</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="container">
                    <h2 class="name">Chase Taylor</h2>
                    <p class="title">Web Developer</p>
                    <p class="text3">I am results-oriented, constantly checking in with the goal to determine how close or how far away we are and what it will take to make it happen.</p>
                    <p><img class="email" src="./images/email.png">ctaylor@citycollege.sheffield.eu</p>
                    <p>
                        <a href="mailto:ctaylor@citycollege.sheffield.eu">
                            <button class="button">Contact</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="container">
                    <h2 class="name">Yusuf Demirhan</h2>
                    <p class="title">Web Developer</p>
                    <p class="text4">I am an excellent communicator. I pride myself on making sure people have the right information because it drives better results. </p>
                    <p><img class="email" src="./images/email.png">ydemirhan@citycollege.sheffield.eu</p>
                    <p>
                        <a href="mailto:ydemirhan@citycollege.sheffield.eu">
                            <button class="button">Contact</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>




</body>

</html>