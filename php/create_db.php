<?php
    $servername = "localhost";
	$username =  "root";
	$password =  "";
	// $dbname =  "fitness_db";
	
	$conn = new mysqli($servername, $username, $password);
    
    $conn = mysqli_connect("localhost","root","");
    if (!$conn)
    	die("Could not connect: " . mysql_error());
    
   	echo "Connected!";
	
    if ($conn->query("CREATE DATABASE fitness_db;"))
    	echo "Database created";
    else
	    echo "Error creating database: " . mysqli_error($con);
	
	
    $conn->close();
?>