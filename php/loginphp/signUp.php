<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $user_name = $_POST["user_name_su"];
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password_su"];
        $user_pass_retype = $_POST["user_pass_retype"];

        $minCharacters = 8;


        if(empty($user_name) || empty($user_password) || empty($user_email) || empty($user_pass_retype)) {
            $_SESSION["message"] = "Please complete all information!";
            header('Location: ../../login.php');
            die;
        }
        
        else if(strlen($user_password) < $minCharacters){
            $_SESSION["message"] = "Password must be greater than or equal to 8 characters!";
            header('Location: ../../login.php');
            die;
        }
        else if (!preg_match("/\d/", $user_password)) {
            $_SESSION["message"] = "Password must contain at least one digit!";
            header('Location: ../../login.php');
            die;
        }
        else if($user_password != $user_pass_retype){
            $_SESSION["message"] = "The passwords do not match!";
            header('Location: ../../login.php');
            die;
        }
        else {

            $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);
            $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
            $user_password = filter_var($user_password, FILTER_SANITIZE_STRING);
            $user_pass_retype = filter_var($user_pass_retype, FILTER_SANITIZE_STRING);

            // Validate e-mail
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) === false) {
                $_SESSION["message"] = "Account Created!";
            } else {
                $_SESSION["message"] = "$user_email is not a valid email address";
                header('Location: ../../login.php');
                die;
            }

            // Hash the password before saving to database
            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

            $user_id = random_num(11);
            $query = "insert into users (user_id, user_name, user_email, user_password) values ('$user_id', '$user_name', '$user_email', '$hashed_password')";
            
            mysqli_query($con, $query);
            header("Location: ../../login.php");
            die;
        }
    } 


?>
