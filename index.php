<?php
session_start();

    include("php/loginphp/connection.php");
    include("php/loginphp/functions.php");

    check_login($con);

    // if (!isset($_SESSION['user_id'])) {
    //     header('Location: login.php');
    //     exit; 
    //   }

    require_once __DIR__.'/calendar/vendor/autoload.php';

    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ . '/calendar/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    $client->setRedirectUri('http://localhost/WebProgCwk/WebProgramming/index.php');

    $tokenPath = 'calendar/token.json';

    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    

    $client->setAccessToken($token);

    if (!file_exists(dirname($tokenPath))) {
        mkdir(dirname($tokenPath), 0700, true);
    }
    file_put_contents($tokenPath, json_encode($client->getAccessToken()));
}
   

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workout Planner</title>
        <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png"
        type="image/x-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/nav_style.css">

        <style>
            
        .jumbotron {
            color: white;
            background-image: url("./images/indexCover.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* height: 100vh; */
            height: 600px;
            
            
        }

        .jumboContainer{
            text-align: center;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
            
        }

        .jumboTitle{
            font-weight: bold;
            font-size: 80px;
           
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto;
            background-color: white;
            padding: 10px;
            row-gap: 10px;
            
            grid-auto-rows: 500px;
            width:100%;
            overflow:hidden;
         }

        .grid-item {
            background-color: rgba(252, 247, 220, 0.8);
            /* border: 1px solid rgba(0, 0, 0, 0.8); */
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }

        .calendarImage{
            background-image: url("./images/calendarBackground.webp");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(4px);
            -webkit-filter: blur(4px); 
            height: 100%;
            padding:0px;

        }

        .grid-item.calendar{
            padding:0%;
        }

        .calendarText{
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position:absolute; 
            top: 800px;
            left: 10%;  
            /* transform: translate(-50%, -50%); */
            z-index: 2;
            width: 400px; 
            padding: 20px; 
            text-align: center;
        }

        .grid-item.workout{
            padding:0%;
        }

        .workoutImage {
            background-image: url("./images/workoutImg.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(4px);
            -webkit-filter: blur(4px); 
            height: 100%;
            padding:0px;
            
        }

        .workoutText {
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(255, 255, 255, 0.4); /* Black w/opacity/see-through */
            color: rgb(0, 0, 0);
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position:absolute; 
            top: 1325px;
            right: 10%;  
            /* transform: translate(-50%, -50%); */
            z-index: 2;
            width: 400px; 
            padding: 20px; 
            text-align: center;
        }

        .grid-item.map{
            padding:0%;
        }

        .mapImage {
            background-image: url("./images/mapImage.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(4px);
            -webkit-filter: blur(4px); 
            height: 100%;
            padding:0px;
        }

        .mapText {
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(255, 255, 255, 0.4); /* Black w/opacity/see-through */
            color: rgb(0, 0, 0);
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position:absolute; 
            top: 2325px;
            right: 10%;  
            /* transform: translate(-50%, -50%); */
            z-index: 2;
            width: 400px; 
            padding: 20px; 
            text-align: center;
        }

        .grid-item.profile {
            padding:0%;
        }

        .profileImage {
            background-image: url("./images/profileImage.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(4px);
            -webkit-filter: blur(4px); 
            height: 100%;
            padding:0px;
            
        }

        .profileText {
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(255, 255, 255, 0.4); /* Black w/opacity/see-through */
            color: rgb(255, 255, 255);
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position:absolute; 
            top: 1825px;
            left: 10%;  
            z-index: 2;
            width: 400px; 
            padding: 20px; 
            text-align: center;
        }

         .calendarText .tooltiptext {
            visibility: hidden;
            width: 500px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            top: 25px;
            left: 110%;
            }

         .calendarText .tooltiptext::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 100%;
            margin-top: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent black transparent transparent;
        }
        .calendarText:hover .tooltiptext {
            visibility: visible;
        }  

        .logoutButton {
            text-align: center;
            border:none;
            color:white;
            background-color:rgb(40, 40, 53);
            font-size:16px;
            padding: 14px 16px;
            height:50px;
        }

        </style>
    </head>

    <body>

        <!-- navigation bar -->
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
                <form name="logout" action="php/loginphp/logout.php" method="POST">
                    <button class="logoutButton">Log Out</button>
                </form>
            </div>
        </div>


        <div class="topDisplay">

            <div class="jumbotron jumbotron-fluid">
                <div class="jumboContainer">
                <h1 class="jumboTitle">WORKOUT <br> PLANNER</h1> <br>
                <p><em>The ideal web application to find exercises and track your fitness progress</em></p>
                </div>
            </div>

        </div>

        <div class="mainBody">
            <div class="grid-container">

                <div class="grid-item calendar"> 
                    <div class="calendarImage"></div>
                    <a href="https://calendar.google.com/calendar/u/0/r">
                        <div class="calendarText">
                            <h1 style="font-size:50px">View Calendar</h1>
                            <!-- <span class="tooltiptext">
                                <h3>View your personalized calendar</h3>
                            </span>        -->
                        </div>
                    </a>
                
                </div>

                <div class="grid-item workout">
                    <div class="workoutImage"></div>
                    <a href="chooseWorkout.php">
                        <div class="workoutText">
                            <h1 style="font-size:50px">Find Workouts</h1>
                        </div>
                    </a>
                </div>

                <div class="grid-item profile">
                    <div class="profileImage"></div>
                    <a href="profile.php">
                        <div class="profileText">
                            <h1 style="font-size:50px">Set Profile</h1>
                        </div>
                    </a>
                </div>  

                <div class="grid-item map">
                    <div class="mapImage"></div>
                    <a href="thessmap.php">
                        <div class="mapText">
                            <h1 style="font-size:50px">Check Map</h1>
                        </div>
                    </a>
                </div>  
        </div>
        



        <script>
        
        $(".jumbotron").css({ height: $(window).height() + "px" });

        $(window).on("resize", function() {
        $(".jumbotron").css({ height: $(window).height() + "px" });
        });

        document.getElementsByClassName("calendarText").innerHTML;

        function redirect() {
            window.location.href = "profile.php";
        }
        

        </script>
    </body>
</html>
