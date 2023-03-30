<?php
session_start();

    include("php/loginphp/connection.php");
    include("php/loginphp/functions.php");

    check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Workout Planner</title>    
    <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png"
    type="image/x-icon" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav_style.css">


    <style>
        /* body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        } */

        .main {
            color: white;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://thumbs.dreamstime.com/b/gym-24699087.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
        }

        body {
            height:100vh;
            max-height: fit-content;
            overflow: hidden;
        }
        
        .mainContainer {
            text-align: center;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            overflow:hidden;
        }

        .title {
            font-weight: bold;
            font-size: 80px;
            color: white;
        }

        .topDisplay {
            display:flex;
            /* align-items:center; */
            justify-content: center;
            
        }

        .container {
            position:absolute;
            top:50%;
            /* left:auto; */
            
            display: flex;
            height: 100%;
            width:auto;
        }

        .container .card {
            
            width: 200px;
            height: 280px;
            background: #232323;
            border-radius: 20px;
            overflow: hidden;
            margin:10px;
        }
        

        .container .card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #f5a95d;
            clip-path: circle(150px at 23% 20%);
            transition: 0.5s ease-in-out;
        }

        .container .card:hover:before {
            clip-path: circle(80px at 90% +80%);
        }

        .container .card:after {
            /* content: 'Chest'; */
            position: absolute;
            top: 10%;
            left: 15%;
            font-size: 2.5em;
            font-weight: 800;
            font-style: italic;
            color: #f5a95d;
            text-align: center;
            left:auto;
            align-self: center;
        }

        #chest:after {
            content: 'Chest';
        }

        #back:after {
            content: 'Back';
        }

        #shoulders:after {
            content: 'Shoulders';
        }

        #arms:after {
            content: 'Arms';
        }

        #abs:after {
            content: 'Abs';
        }

        #legs:after {
            content: 'Legs';
        }

        .container .card .imgBx {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10000;
            width: 100%;
            height: 220px;
            transition: 0.5s;
        }

        .container .card:hover .imgBx {
            top: 0%;
            transform: translateY(50%);
        }

        .container .card .imgBx img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            /* height: 80%; */
        }

        .logo {
            position: absolute;
            padding:5px;
            padding-top:1px;
            padding-bottom:10px;
            margin-left:100px;
            height:60px;
            width:295px;
        }

        .logoutForm input[type=submit] {
            text-align: center;
            border:none;
            color:white;
            background-color:rgb(40, 40, 53);
            font-size:16px;
            padding: 14px 16px;
            height:50px;
            cursor: pointer;
            left:auto;
        }

        /* Submit button style */
        #submitBtn{
            background: rgb(40, 40, 53);
            color: #fff;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
        }

        #submitBtn:hover {
            background: #f5a95d;
            color: #fff;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
        }
    </style>
</head>

<body>

    <!-- navigation bar -->
    <div class="topnav">
        <div class="dropdown">
            <button class="dropbutton"><a href="index.php">Index</a>
            </button>
        </div>
        
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

    
    <div class="topDisplay">
        <div class="main main-fluid">
            <div class="mainContainer">
                <h1 class="title">Choose Workout</h1> <br>
                <p><em>Select any category to continue.</em></p>
                <div class="">
                <form class="form-inline" method="GET" action="./searchEngine.php">
                    <input type="text" placeholder="Search here" name="k" autocomplete="off"/>
                    <input id="submitBtn" type="submit" name="" value="Submit" class="">
                </form>
                </div>
            </div>
        </div>

    <div class="container">
        <a href="workouts/chest.html">
            <div class="card" id="chest">
                <div class="imgBx">
                    <img
                        src="images/chest.png">
                </div>
            </div>
        </a>
        <a href="workouts/back.html">
            <div class="card" id="back">
                <div class="imgBx">
                    <img src="images/back.png">
                </div>
            </div>
        </a>
        <a href="workouts/shoulders.html">
            <div class="card" id="shoulders">
                <div class="imgBx">
                    <img src="images/shoulders.png">
                </div>
            </div>
        </a>
        <a href="workouts/arms.html">
            <div class="card" id="arms">
                <div class="imgBx">
                    <img src="images/arms.png">
                </div>
            </div>
        </a>
        <a href="workouts/abs.html">
            <div class="card" id="abs">
                <div class="imgBx">
                    <img src="images/abs.png">
                </div>
            </div>
        </a>
        <a href="workouts/legs.html">
            <div class="card" id="legs">
                <div class="imgBx">
                    <img src="images/legs.png">
                </div>
            </div>
        </a>
    </div>
</div>

</body>

</html>