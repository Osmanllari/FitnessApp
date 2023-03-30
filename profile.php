<?php
session_start();

    include("php/loginphp/connection.php");
    include("php/loginphp/functions.php");

    check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            margin:0;
            overflow-x: hidden;
            background-color: #071329;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 400px auto auto;
            background-color: #071329;
            padding: 5px;
            margin:0px;
            width:100vw;
            height:100vh;   
        }

        .grid-item {
            box-shadow: 2px, 5px, 20px;
            background-color: #28334b;
            border: 5px solid #071329;
            border-radius: 25px;
            padding: 5px;
            margin-top:50px;
            font-family: sans-serif;
            color: white;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #3b4f78;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: white;
            width: 50%;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: rgb(113, 116, 160);
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #3fb6a8;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        /* styling the labels for the personal fields */
        .personalForm {
            font-family: "Roboto", "sans-serif";
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            margin-left: 2px;
            margin-top: 10px;
            text-align: center;
        }


        /* personal info fields  */
        .updateFields {
            border: 0;
            border-bottom: 1px solid #3fb6a8;
            width: 80%;
            font-family: "montserrat", sans-serif;
            padding: 5px 0;
            text-align: center;
            background: transparent;
            color: aliceblue;
            margin-bottom: 15px;
            font-size: 20px;
        }

        /* Styling update button */
        input[type=submit],
        .bmiButton,
        .recalculateButton {
            font-family: "roboto", sans-serif;
            text-transform: uppercase;
            font-size: 15px;
            border: 0;
            background: #3fb6a8;
            padding: 7px, 15px;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, .5);
            cursor: pointer;
            margin-top: 15px;
            height: 40px;
            width: 30%;
            text-align: center;

        }

        .bmiCalculator {
            font-family: "Roboto", "sans-serif";
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            margin-left: 2px;
            margin-top: 10px;

        }

        /* #Metric, #Imperial{
            
        } */

        .metricLabel,
        .metricUnitLabel,
        .imperialLabel,
        .imperialUnitLabel {
            display: inline-block;
            text-transform: lowercase;
        }

        input[type=number] {
            background-color: #071329;
            height: 20px;
            border-radius: 5px;
            color: white;
        }

        #infoText {
            float: left;
            width: auto;
            padding-right: 5px;
            margin: 0%;
        }

        /* #bmiResultValue {
        
        } */

        table,
        th,
        td {
            border: 1px solid #3fb6a8;
            text-align: center;
            padding: 5px;
        }

        table {
            border-collapse: collapse;
        }

        .recalculateButton {
            margin-top: 50px;
            width: auto;
        }

        #recalculateBMI {
            text-align: center;
        }

        /* Slider for setting weekly amount of exercise */
        .goal-radio {
            display: flex;
            justify-content: center;
            width: 80%;
        }

        .goal-opt {
            max-width: 33.3333333%;
            align-items: center;
            text-align: center;
            width: 100%;
        }

        .goal-opt input {
            position: inherit !important;
            margin: auto !important;
        }

        .goal-opt input:after {
            content: "";
            position: relative;
            display: block;
            left: -30%;
            bottom: 50%;
            height: 155%;
            width: 155%;
            background-color: #CCC;
            border: 3px solid #FFF;
            border-radius: 100%;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            /* padding-top: 30vh; */
        }

        .line {
            background-color: #3fb6a8;
            position: relative;
            width: 100%;
            height: 20%;
            top: 25%;
            z-index: 0;
        }

        .line.first {
            width: 50%;
            margin-left: 50%;
        }

        .line.last {
            width: 50%;
            margin-right: 50%;
        }

        .goal-radio input:checked:after {
            content: "";
            background-color: #071329;
            display: block;
        }

        .goal-radio label {
            font-size: 12px;
            padding-left: 5px;
        }

        .logoutButton {
            text-align: center;
            border:none;
            color:white;
            background-color:rgb(40, 40, 53);
            font-size:16px;
            padding: 14px 16px;
        }

        /* Designing user goals section */
        .user-goals {
            text-align: center;
        }

        #stepsID, #weightID {
            width:100px;
            text-align: center;
        }

        .user-goals input[type=submit], .user-progress input[type=submit] {
            border-radius: 5px;
            width:100px;
        }
        
        /* Designing user progress section */
        .user-progress {
            text-align: center;
        }

        /* Nav, logo & logout button */
        .topnav {
            height:50px;
        }

        .topnav a{
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 15px;
            width:auto;
            min-width: 68px;
        }

        .logo {
            position: absolute;
            padding:5px;
            padding-top:1px;
            padding-bottom:10px;
            margin-left:100px;
            height:50px;
            width:295px;
        }

        .logoutButton {
            text-align: center;
            border:none;
            color:white;
            background-color:rgb(40, 40, 53);
            font-size:16px;
            padding: 14px 16px;
            height:50px;
            cursor: pointer;
        }
        
        .canvas {
        }
/* File upload */
        /* .container{
            display: grid;
            height: 70%;
            place-items: center;
            text-align: center;
        }

        .container .wrapper{
            position: relative;
            height: 300px;
            width: 90%;
            border-radius: 10px;
            background: white;
            border: 2px dashed #c2cdda;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .wrapper .image{
            position: absolute;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper .image img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .wrapper .icon{
            font-size: 100px;
            color: #9658fe;
        }

        .wrapper .text{
            font-size: 20px;
            font-weight: 500;
            color: #5B5B7B;
        }

        .wrapper #cancel-btn{
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 20px;
            cursor: pointer;
            color: #9658fe;
            display: none;
        }

        .wrapper .file-name{
            position: absolute;
            bottom: 0px;
            width: 100%;
            color: #fff;
            padding: 8px 0;
            font-size: 18px;
            display: none;
            background: linear-gradient(135deg, #3a8ffe 0%,#9658fe 100%);
        }

        .container #custom-btn{
            margin-top: 0px;
            width: 90%;
            height: 50px;
            display: block;
            border: none;
            border-radius: 25px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            background: linear-gradient(135deg, #3a8ffe 0%,#9658fe 100%);
        } */

    </style>
</head>

<body>

    <!-- navigation bar -->
    <div class="topnav">
        <div class="dropdown">
            <a href="index.php">Index</a>
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
            <form name="logout" action="php/loginphp/logout.php" method="POST">
                <button class="logoutButton">Log Out</button>
            </form>
        </div>

        
    </div>
    

    <div class="grid-container">
        <div class="grid-item personal-info">
            <h1>Personal Info</h1>

            <br><br><br>

            <div class="personalForm">
                <form id="piForm">

                    <label for="fname" style>Username: </label> <br><br>
                    <input type="text" class="updateFields" id="fname" name="fname" value="users name"><br><br>

                    <label for="email">Email: </label> <br><br>
                    <input type="email" class="updateFields" id="email" name="email" value="users email"><br><br>

                    <input type="submit" value="Update">

                </form>
            </div>

            <br><br><br><br>

            <h4>Body Mass Index (BMI) Calculator</h4>

            <div id="bmiSection">
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'Metric')">Metric</button>
                    <button class="tablinks" onclick="openTab(event, 'Imperial')">Imperial</button>
                </div>

                <div class="bmiCalculator">
                    <div id="Metric" class="tabcontent">

                        <form>
                            <label for="height">Height:</label><br>

                            <div class="metricLabel">
                                <input type="number" id="heightMetric" name="height">
                            </div>

                            <div class="metricUnitLabel">
                                <p>cm</p>
                            </div>

                            <br><br>

                            <label for="weight">Weight:</label> <br>

                            <div class="metricLabel">
                                <input type="number" id="weightMetric" name="weight">
                            </div>

                            <div class="metricUnitLabel">
                                <p>kg</p>
                            </div>

                            <br><br>

                            <button type="button" class="bmiButton" onclick="calculateMetric()">Calculate</button>
                        </form>

                    </div>

                    <div id="Imperial" class="tabcontent">

                        <form>
                            <label for="height">Height: </label> <br>

                            <div class="imperialLabel">
                                <input type="number" id="heightFeet" name="heightFeet">
                            </div>

                            <div class="imperialUnitLabel">
                                <p>Feet</p>
                            </div>

                            <div class="imperialLabel">
                                <input type="number" id="heightInch" name="heightInch">
                            </div>

                            <div class="imperialUnitLabel">
                                <p>Inches</p>
                            </div>
                            <br><br>

                            <label for="weight">Weight:</label> <br>

                            <div class="imperialLabel">
                                <input type="number" id="weightImperial" name="weight">
                            </div>

                            <div class="imperialUnitLabel">
                                <p>Stones</p>
                            </div>

                            <br><br>

                            <button type="button" class="bmiButton" onclick="calculateImperial()">Calculate</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="bmiResults" style="display:none">
                <!-- <h4>Results</h4> -->
                <p id="infoText">Your BMI is:</p>
                <p id="bmiResultValue"></p>
                <p id="indicateText"></p>


                <br><br>
                <table id="bmiTable" style="width:100%">
                    <tr>
                        <th>BMI</th>
                        <th>Weight Category</th>
                    </tr>
                    <tr>
                        <td>Below 18.5</td>
                        <td>Underweight</td>
                    </tr>
                    <tr>
                        <td>18.5 - 24.9</td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td>25.0 - 29.9</td>
                        <td>Overweight</td>
                    </tr>
                    <tr>
                        <td>Above 30</td>
                        <td>Obese</td>
                    </tr>
                </table>

                <div id="recalculateBMI">
                    <button type="button" class="recalculateButton" onclick="recalculateBMI()">Recalculate</button>
                </div>
            </div>

            <br><br>


           <!-- User Photo upload -->
           <div>
                <?php if(isset($_GET['error'])): ?>
                    <p><?php echo $_GET['error']; ?></p>
                <?php endif ?>    

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="my_image">
                    <input type="submit" name="submit" value="Upload"> 
                </form>
           </div>


           <?php
                $sql = "SELECT * FROM users ORDER BY id DESC";
                $res = mysqli_query($con, $sql);

                if(mysqli_num_rows($res) > 0){
                while($images = mysqli_fetch_assoc($res)){ ?>
     
                <div class="file_upl">
                    <img src="upload_files/<?=$images["image_url"]?>">
                </div>

            <?php  } }?>



        </div>
        <div class="grid-item user-goals">
            <h1>Goals</h1>

            <h2>Set the weekly amount of exercise:</h2>
            <div class="exerciseGoals">

                <div class="flex-center exerciseRadio">
                    <div class="goal-radio">

                        <div class="goal-opt">
                            <div class="line first"></div>
                            <input type="radio" name="gap"> <br> <label>Once a Week</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line"></div>
                            <input type="radio" name="gap"> <br> <label>2</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line"></div>
                            <input type="radio" name="gap"> <br> <label>3</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line"></div>
                            <input type="radio" name="gap"> <br> <label>4</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line"></div>
                            <input type="radio" name="gap"> <br> <label>5</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line"></div>
                            <input type="radio" name="gap"> <br> <label>6</label>
                        </div>

                        <div class="goal-opt">
                            <div class="line last"></div>
                            <input type="radio" name="gap"> <br> <label>Every day</label>
                        </div>

                    </div>
                </div>

            </div>
            
            <br><br><br>

            <div class="exerciseCheck">
                <h2>Have you exercised today?</h2>
                <form action="/action_page.php">
                    <input type="radio" id="yesExercised" name="exerciseAnswer" value="Yes">
                    <label for="answerYes">Yes</label>
                    <input type="radio" id="noExercised" name="exerciseAnswer" value="No">
                    <label for="answerNo">No</label><br>
                    <input type="submit" class="button" value="Submit">
                    
                    <br><br><br>
                </form>
            </div>

            <div>
                <h2>Set the goal amount of daily steps:</h2>
                    <div>
                        <form name="dailySteps" action="./php/insert.php" method="POST">
                            <input type="number" id="stepsID" name="amountOfSteps">
                            <input type="submit" class="button" value="Submit">
                        </form>
                    </div>
            </div>
            <?php

            // $goal_steps =$_POST['amountOfSteps'];
            // $sql = "INSERT INTO users(user_steps) 
            //         VALUES('$goal_steps')";
            // mysqli_query($con, $sql);
            ?>
            <br><br>
            <div>
                <h2>Set the weight target</h2>
                    <div>
                        <form name="weightTarget" action="./php/insert.php" method="POST">
                            <input type="number" id="weightID" name="weightGoal">
                            <input type="submit" class="button" value="Submit">
                        </form>
                    </div>
            </div>
            <?php

            // $goal_weight =$_POST['weightGoal'];
            // $sql = "INSERT INTO users(user_weight) 
            //         VALUES('$goal_weight')";
            // mysqli_query($con, $sql);
            ?>

        </div>
        <div class="grid-item user-progress">

        <h1>Progress</h1>

        <br><br><br>

        <br><br><br>

        <div>
            <form name="" action="./php/insert.php" method="POST">
                <label for="">Today's Steps</label><br>
                <input type="number" id="todayStepID" name="todayStep"><br>
                <input type="submit" class="button" value="Submit">
            </form>
        </div>
        <?php

        // $daily_weight =$_POST['todayStep'];
        // $sql = "INSERT INTO users(user_daily_steps) 
        //         VALUES('$daily_weight')";
        // mysqli_query($con, $sql);
        ?>

        <br><br><br>

        <div>
            <form name="" action="" method="POST">
                <label for="">Today's Weight</label><br>
                <input type="number" id="todayWeightId" name="todayWeight"><br>
                <input type="submit" class="button" value="Submit">
            </form>
        </div>
        <?php

        // $daily_weight =$_POST['todayWeight'];
        // $sql = "INSERT INTO users(user_daily_weight) 
        //         VALUES('$daily_weight')";
        // mysqli_query($con, $sql);
        ?>
    
        <br><br><br>

        <h2>Steps</h2>   
        <canvas id="stepChart" style="width:100%;max-width:700px;background-color:white"></canvas>
        <br><br><br>

        <h2>Weight</h2>

        <canvas id="weightChart" style="width:100%;max-width:700px;background-color:white"></canvas>
        <br><br><br>

        <script>
            //
            window.onload = function() {

                // steps chart
                // xyWeight[] = user_steps
                // from Users table

                //
                var xySteps = [
                {x:1, y:1000},
                {x:2, y:2000},
                {x:3, y:2500},
                {x:4, y:2555},
                {x:5, y:2576},
                {x:6, y:3000},
                {x:7, y:2400},
                {x:8, y:3000},
                {x:9, y:2888},
                {x:10, y:1000},
                {x:11, y:2500}
                ];

                new Chart("stepChart", {
                type: "scatter",
                data: {
                    datasets: [{
                    pointRadius: 4,
                    pointBackgroundColor: "#3fb6a8",
                    data: xySteps
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                    xAxes: [{ticks: {min: 1, max:16}}],
                    yAxes: [{ticks: {min: 1, max:3000}}],
                    }
                }
                });

                // weight chart
                // xyWeight[] = user_weight
                // from Users table
                
                // set xAxes min/max to 0/1 and the numberOfDays
                // in the event that they miss a day, that day should show up
                // formatting options:
                // numerical values
                // 15 Aug = DD MMM
                
                // set yAxes min/max to the smallest and largest values in xyWeight
                
                // if you implement a legend to show X as time and Y as weight/steps, remember to use the same styling as the rest of the page (font, color etc)

                var xyWeight = [
                {x:1, y:300},
                {x:2, y:290},
                {x:3, y:280},
                {x:4, y:290},
                {x:5, y:290},
                {x:6, y:310},
                {x:7, y:280},
                {x:8, y:300},
                {x:9, y:280},
                {x:10, y:270},
                {x:11, y:260}
                ];

                new Chart("weightChart", {
                animationEnabled: true,
                title: {
		        text: "Weight"
                },
                type: "scatter",
                data: {
                    datasets: [{
                    pointRadius: 4,
                    pointBackgroundColor: "#3fb6a8",
                    data: xyWeight
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                    xAxes: [{ticks: {min: 1, max:16}}],
                    yAxes: [{ticks: {min: 1, max:400}}],
                    }
                }
                });
        }

        /*

<PHP

header('Content-Type: application/json');

$con = mysqli_connect("","","","");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "SELECT * FROM Users");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("" => $row[''] , "" => $row['']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

PHP>

        */

        </script>



        </div>
    </div>

    <script>

        function openTab(evt, whichTab) {
            let i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");

            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");

            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(whichTab).style.display = "block";
            evt.currentTarget.className += " active";
        }


        function calculateMetric() {
            let heightValue = document.getElementById("heightMetric").value;
            let weightValue = document.getElementById("weightMetric").value;

            //convert cm into meters
            heightValue = heightValue / 100;

            let bmiValue = weightValue / Math.pow(heightValue, 2);

            bmiValue = bmiValue.toFixed(1);

            if (validateInput(heightValue, weightValue)) {
                displayResult(bmiValue);
            }
        }


        function calculateImperial() {
            let heightValueFeet = document.getElementById("heightFeet").value;
            let heightValueInch = document.getElementById("heightInch").value;
            let weightValuePound = document.getElementById("weightImperial").value;

            //converting the height from feet into inches
            heightValueInch = (heightValueFeet * 12) + heightValueInch;

            let bmiValue = (weightValuePound / Math.pow(heightValueInch, 2)) * 703;

            bmiValue = bmiValue.toFixed(1);

            if (validateInput(heightValueFeet, weightValuePound)) {
                displayResult(bmiValue);
            }

        }


        function validateInput(heightValue, weightValue) {
            if (heightValue == '' || weightValue == '') {
                alert("Value for Height or Weight cannot be empty!");
                return false;
            }
            if (heightValue < 0 || weightValue < 0) {
                alert("Value for Height or Weight cannot be negative!");
                return false;
            }
            return true;
        }


        function displayResult(bmiValue) {
            let content = document.getElementById("bmiSection");
            let results = document.getElementById("bmiResults");

            content.style.display = "none";
            results.style.display = "block";

            document.getElementById("bmiResultValue").innerHTML = bmiValue.bold();

            let indicateResult = document.getElementById("indicateText");
            let bmiCategory;

            if (bmiValue < 18.5) {
                bmiCategory = "Underweight";
            }
            else if (bmiValue < 25) {
                bmiCategory = "Normal";
            }
            else if (bmiValue < 30) {
                bmiCategory = "Overweight";
            }
            else {
                bmiCategory = "Obese";
            }

            indicateResult.innerHTML = "This indicates that your weight is in the " + bmiCategory.bold() + " category for adults of your height.";
        }

        function recalculateBMI() {
            let content = document.getElementById("bmiSection");
            let results = document.getElementById("bmiResults");

            results.style.display = "none";
            content.style.display = "block";
        }


        //Working with AJAX
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "php/userData.php", true);
        ajax.send();
        
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let user_data = JSON.parse(this.responseText);
                console.log(user_data);

                let username = "";
                let useremail = "";;

                    user_data.forEach(element => {
                        username = element.user_name;
                        useremail = (element.user_email);
                    });

                document.getElementById("fname").value = username;
                document.getElementById("email").value = useremail;
            }
        };
        
    </script>
</body>

</html>