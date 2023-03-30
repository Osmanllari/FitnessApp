<?php
//session_start();

    include("loginphp/connection.php");
	mysqli_select_db($con,"fitness_db");

    $user_id = $_SESSION["user_id"];
    $query = "select id from users where user_id = '$user_id' limit 1";

    $result = mysqli_query($con, $query);
    if($result && mysqli_num_rows($result) > 0){
        $user_data = mysqli_fetch_assoc($result);
    }

    $scheduleId = $user_data['id'];
    $scheduleName = $_SESSION['scheduleName'];
    $scheduleDate = $_SESSION['scheduleDate'];

    $query2 = "select exercise_id from exercises where title = '$scheduleName' limit 1";
    $result2 = mysqli_query($con, $query2);
    if($result2 && mysqli_num_rows($result2) > 0){
        $user_data2 = mysqli_fetch_assoc($result2);
    }

    $scheduleName = $user_data2['exercise_id'];


    // (table id, user_id, workout_id, exercise_date)
    $sql = "INSERT INTO Schedule VALUES (DEFAULT, '$scheduleId', '$scheduleName', '$scheduleDate');";


    if ($con->query($sql) === TRUE)
        header('Location: ../searchEngine.php');
    else
        echo "Error " . $con->error;


    $con->close();

