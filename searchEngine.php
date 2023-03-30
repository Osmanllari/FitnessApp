<?php
    // database connection
    //include("./php/loginphp/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Workout Planner</title>    
    <link rel="icon" href="https://www.logolynx.com/images/logolynx/67/6768ca606797b732785b029a64c1384b.png" type="image/x-icon"/> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav_style.css">

    <style>

        body {
            background-color:#071329;
            color:white;
            overflow-y:scroll;
        }

        .main {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
        }

        .mainContainer {
            text-align: center;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .title {
            font-weight: bold;
            font-size: 45px;
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
            background: #9bdc28;
            clip-path: circle(150px at 20% 20%);
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
            font-size: 3em;
            font-weight: 800;
            font-style: italic;
            color: rgba(255, 255, 25, 0.05);
        }

        /* .searchBar {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 20px;
            background-color: #071329;
        } */

        /*
        .searchField {
            margin: auto;
            width: 80%;
            border: 3px solid black;
            padding: 10px;
        }
        */

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

    <div class="topDisplay">
        <div class="main main-fluid">
            <div class="mainContainer">
                <h1 class="title">Search</h1>
                    <form class="form-inline" method="GET" action="">
                        <div class="searchContainer">
                        <input type="text" placeholder="Search for an exercise" name="k" autocomplete="off"/>
                        <input id="submitBtn" type="submit" name="" value="Submit">
                        </div>
                    </form>
                    
                    <?php
                        
                        // Check to see if the keywords were provided
                        //  && $_GET['k'] != '')
                        if(isset($_GET['k'])) {

                            // save the keywords from the url
                            $k = trim($_GET['k']);
                            
                            // create a base query and words string
                            $query_string = "SELECT * FROM exercises WHERE ";
                            $display_words = "";

                            // separates each one of the keywords
                            $keywords = explode(' ', $k);
                            // print_r($query_string);
                            foreach($keywords as $word) {
                                $query_string .= " keywords LIKE '%".$word."%' OR ";
                                $display_words .= $word." ";
                            }
                            
                            // removes the OR from $query_string
                            $query_string = substr($query_string, 0, strlen(($query_string)) - 3);

                            // connect to database
                            $con = mysqli_connect("localhost", "root","", "fitness_db");

                            $query = mysqli_query($con, $query_string);
                            $result_count = mysqli_num_rows($query);
                            $total_count = $result_count;

                            $page_number = 1;
                            $result_limit = 10;

                            if ($page_number != 1) {
                                $offset = $page_number * $result_limit;
                            } else {
                                $offset = 1;
                            }

                            $result_filter = "LIMIT 5 OFFSET ".$offset;
                            $query_string .= $result_filter;

                            $query = mysqli_query($con, $query_string);
                            $result_count = mysqli_num_rows($query);

                            // check to see if the results were returned
                            if($total_count > 0) {
                                // display search result count
                                echo '<div class="right"><b><u>'.$result_count.'</u></b> results found </div>';
                                echo 'Your search for <i>'.$display_words.'</i> <hr /> <br />';
                                
                                echo '<br><br>';

                                echo '<table class="search">';

                                // display all the search results to the user
                                // add formatting returning the results in a table
                                while($row = mysqli_fetch_assoc($query)) {
                                    echo '<tr>
                                        <tr>
                                            <td><h3><a href="'.$row['url'].'">'.$row['title'].'<a/></h3></td>
                                        </tr>
                                        <tr>
                                            <td>'.$row['blurb'].'</td>
                                        </tr>
                                        <tr>
                                            <td><i>'.$row['url'].'</i></td>
                                        </tr>
                                    </tr>';

                                    echo '<br><br>';

                                    echo '</table>';
                                }

                                if ($total_count >= 10) {
                                    echo '<ul class="pagination">';
                                    $number_of_pages = ceil($total_count / $result_limit);
                                    for ($i = 1; $i <= $number_of_pages; $i++) {
                                        echo '<li><a href="./searchEngine.php?k='.$k.'"<?php $page_number = $i?>>'.$i.'</a></li><br>';
                                    }
                                    echo '</ul>';
                                }

                            } else {
                                // error
                                echo '<b>No results</b> found for <i>'.$display_words.'</i><br> Please search for something else.';
                            }
                        } else {
                            // error
                            echo '';
                        }
                    
                    ?>
            </div>
    </body>
</html>