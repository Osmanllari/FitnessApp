<?php

if(isset($_POST['submit']) && isset($_FILES['my_image'])){
    include "./php/loginphp/connection.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "<pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error == 0){
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: profile.php?error=$em");
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            // echo($img_ex);

            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = './upload_files/'. $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                //Insert into Database
                $sql = "INSERT INTO users(image_url) 
                        VALUES('$new_img_name')";
                mysqli_query($con, $sql);

                //------STAY IN PROFILE----------
                header("Location: profile.php");
            }
            else{
                $em = "You can't upload files of this type.";
                header("Location: profile.php?error=$em");
            }
        }
    }
    else{
        $em = "unknown error occured!";
        header("Location: profile.php?error=$em");
    }
}
else{
    header("Location: profile.php");
}