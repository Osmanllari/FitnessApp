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
    <title>Workout Planner - ThessMap</title>
    <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png"
        type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="./css/nav_style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            position: relative;
            left: 50%;
            width: 100%;
            margin-top: 10%;
            margin-bottom: 5%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-style: italic;
            font-size: 60px;
            font-weight: 600;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            background-image: repeating-radial-gradient(farthest-side at 5px 5px, #553c9a, #ee4b2b, #553c9a);
        }

        #map {
            height: 450px;
            width: 95%;
        }

        img {
            width: 200px;
            height: 150px;
        }



        /*  Animation background  */
        .background {
            background: linear-gradient(132deg, #FC415A, #591BC5, #212335);
            background-size: 400% 400%;
            animation: Gradient 15s ease infinite;
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            padding: 0;
            margin: 0px;
        }

        .cube {
            position: absolute;
            top: 80vh;
            left: 45vw;
            width: 10px;
            height: 10px;
            border: solid 1px #D7D4E4;
            transform-origin: top left;
            transform: scale(0) rotate(0deg) translate(-50%, -50%);
            animation: cube 12s ease-in forwards infinite;
        }

        .cube:nth-child(2n) {
            border-color: #FFF;
        }

        .cube:nth-child(2) {
            animation-delay: 2s;
            left: 25vw;
            top: 40vh;
        }

        .cube:nth-child(3) {
            animation-delay: 4s;
            left: 75vw;
            top: 50vh;
        }

        .cube:nth-child(4) {
            animation-delay: 6s;
            left: 90vw;
            top: 10vh;
        }

        .cube:nth-child(5) {
            animation-delay: 8s;
            left: 10vw;
            top: 85vh;
        }

        .cube:nth-child(6) {
            animation-delay: 10s;
            left: 50vw;
            top: 10vh;
        }


        /* Header content & title*/
        .main {
            top: 10px;
            /* right: 0px; */
            left: 5%;
            z-index: 1;
            position: absolute;
        }

        .side {
            top: 25%;
            right: 30px;
            z-index: 1;
            width: 40%;
            position: absolute;
            font-size: 1.1em;
            margin: auto;
            text-align: center;
            border: 3px solid black;
            padding: 10px;
        }


        /* Animate Background*/
        @keyframes Gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes cube {
            from {
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }

            to {
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        .topnav, .topnav a {
            height:50px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 16;
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
            <form name="logout" class="logoutForm" action="php/loginphp/logout.php" method="POST">
                <input type="submit" class="button" value="Log Out">
            </form>
        </div>
    </div>

    <!-- Background & animation & title -->
    <div class="container-fluid">

        <!-- Background animtion-->
        <div class="background">
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div>

        <!-- header -->
        <div class="main">
            <!-- title & content -->
            <section class="header-content">
                <h1>Thessaloniki Map of Gyms</h1>
                <div id="map"></div>
            </section>
        </div>
        <div class="side">
            <h2>ALTERLIFE Warehouse</h2>
            <p>
                We are passionately looking forward to meet you in our 58 Clubs in Greece and Cyprus, to drag you with our immense energy and introduce you to the magic world of physical exercise. We will not give up until all your fitness goals are fulfilled.
                Change your life – Give your body all the attention it deserves.
            </p>
            <br>
            <h2>Mad Gym</h2>
            <p>
                In our unique facilities you have at your disposal a huge variety of gym equipment and machines as well as the most modern and efficient group fitness programs! Whatever your training goal is, here you will find everything you need to achieve it in the fastest and most efficient way. Mad Gym Exclusive Fitness Center invests in the avant-garde, bringing together all the innovative fitness & training services and thus creating new trends in the gym of Greece.
            </p>
            <br>
            <h2>Elixir Studio Olgas</h2>
            <p>
                At PROLEPSIS we deeply believe that the person who takes care of his health from an early age, is productive, happy and have better, more and more beautiful years of life. We have a great desire to participate in creating a society with more people who aim for a better quality of life through our health care.
            </p>
        </div>
        



        <script>
            function initMap() {

                // Map options
                var mapOptions = {
                    zoom: 13,
                    center: { lat: 40.6401, lng: 22.9444 }
                }

                // New Map
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                // Add marker
                // ALTERLIFE Warehouse 7
                var marker1 = new google.maps.Marker({
                    position: { lat: 40.6349, lng: 22.9342 },
                    //add the marker to the map
                    map: map
                });

                // Mad Gym
                var marker2 = new google.maps.Marker({
                    position: { lat: 40.6566, lng: 22.9352 },
                    map: map
                });

                //ELIXIR STUDIO OLGAS
                var marker3 = new google.maps.Marker({
                    position: { lat: 40.6159, lng: 22.9543 },
                    map: map
                });

                //Another way to add the marker to the map, call setMap(); (markerNR)
                // marker.setMap(map);

                // InfoWindow
                const detailWindow1 = new google.maps.InfoWindow({
                    content: '<h2>ALTERLIFE Warehouse 7</h2> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEWl2iLvB3-0SI3xlpNFCvXl-ccU4VAsmH6w&usqp=CAU">'
                });

                const detailWindow2 = new google.maps.InfoWindow({
                    content: '<h2>Mad Gym</h2> <img src="https://www.biscotto.gr/file/2018/09/mad.jpg">'
                });

                const detailWindow3 = new google.maps.InfoWindow({
                    content: '<h2>Elixir Studio Olgas</h2> <img src="https://lh5.googleusercontent.com/p/AF1QipOowNj_bLYsWcSu-AaPZ4an79uVN53y9kfgQzCu=w500-h500-k-no">'
                });

                marker1.addListener("click", () => {
                    detailWindow1.open(map, marker1);
                })

                marker2.addListener("click", () => {
                    detailWindow2.open(map, marker2);
                })

                marker3.addListener("click", () => {
                    detailWindow3.open(map, marker3);
                })
            }

        </script>

        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3WrwCTKjN2f1khV2PWOaxO0mqdsetN1I&callback=initMap">
            </script>
</body>

</html>