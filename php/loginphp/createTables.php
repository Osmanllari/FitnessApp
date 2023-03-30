<?php
    $servername = "localhost";	
    $username = "root";
    $password = "";

    // Create connection
	$con = new mysqli($servername, $username, $password);
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	echo "Connected!";

    // select the db that you will be working on for this connection
	mysqli_select_db($con,"fitness_db");

    // create table sql command
	$sql = "CREATE TABLE Users
    (
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    user_id int,
    user_name varchar(20),
    user_email varchar(255),
    user_password varchar(60),
    join_date timestamp,
    user_weight int,
    user_steps int,
    image_url text
    );";

    $sql .= "CREATE TABLE Exercises
    (
    exercise_id int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(exercise_id),
    title varchar(200),
    category varchar(20),
    blurb text,
    url text,
    keywords text
    );";

    $sql .= "CREATE TABLE Schedule
    (
    schedule_id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(schedule_id),
    user_id int,
    exercise_id int,
    exercise_date timestamp,
    FOREIGN KEY(user_id) REFERENCES Users(id),
    FOREIGN KEY(exercise_id) REFERENCES Exercises(exercise_id)
    );";

    // execute query
    if ($con -> multi_query($sql)){
		do{
			if($result = $con -> store_result()) {
				while($row = $result -> fetch_row()) {
					printf("%s\n", $row[0]);
				}
				$result -> free_result();
				}

	    		if ($con -> more_results()) {
                    printf("Table created\n");
					printf("-------------\n");
                    
				}
				
			} while($con -> next_result());

		} else echo "Error executing query: " . mysqli_error($con);


    $con->close();
?>