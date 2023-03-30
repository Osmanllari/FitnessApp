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

    // (exercise_id, title, category, blurb, url, keywords)
    $sql = "INSERT INTO Exercises VALUES (1, 'Dumbbell Bench Press', 'Chest', 'The dumbbell bench press is an upper-body exercise that activates your arm, shoulder, and chest muscles. Perform the dumbbell bench press exercise by lying flat on your back on a bench.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'dumbbell bench press chest');";
	$sql .= "INSERT INTO Exercises VALUES (2, 'Barbell Bench Press', 'Chest', 'The bench press is a compound exercise that targets the muscles of the upper body. It involves lying on a bench and pressing weight upward using either a barbell or a pair of dumbbells.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'barbell bench press chest');";
    $sql .= "INSERT INTO Exercises VALUES (3, 'Incline Bench Press', 'Chest', 'The purpose of the incline press is to focus more of the work on the upper pecs. The main benefit in performing incline presses is to develop the upper portion of the pectoral muscles.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'incline bench press chest');";
	$sql .= "INSERT INTO Exercises VALUES (4, 'Machine Chest Press', 'Chest', 'The chest press machine is an excellent exercise for beginners. It provides an effective but straightforward way to work your upper body.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'machine press chest');";
	$sql .= "INSERT INTO Exercises VALUES (5, 'Push Ups', 'Chest', 'Pushups are beneficial for building upper body strength. They work the chest, triceps, pectoral muscles and shoulders. Pushups are a fast and effective exercise for building strength.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'push up ups chest');";
	$sql .= "INSERT INTO Exercises VALUES (6, 'Chest Fly', 'Chest', 'The fly machine is ideal for increasing chest strength and muscle mass by targeting the pectoralis muscles. You have two sets of pectoral(major/minor) muscles on each side of the front of your chest.', 'http://localhost/WebProgCwk/WebProgramming/workouts/chest.html', 'fly cable chest');";
	
	$sql .= "INSERT INTO Exercises VALUES (7, 'Back Extension', 'Back', 'Back extension exercises can strengthen lower back muscles. This includes the erector spinae, which supports the lower spine.', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'extension cable back');";
	$sql .= "INSERT INTO Exercises VALUES (8, 'Deadlift', 'Back', 'Deadlifting can increase core strength, core stability and improve your posture. Deadlifting trains most of the muscles in the legs, lower back and core.', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'dead lift back');";
	$sql .= "INSERT INTO Exercises VALUES (9, 'Pull Ups', 'Back', 'A pullup is an upper body strength training exercise. To perform a pullup, you start by hanging onto a pullup bar with your palms facing away from you and your body extended fully.', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'pull up ups back');";
	$sql .= "INSERT INTO Exercises VALUES (10, 'Bent-Over Row', 'Back', 'Bent-over rows can help build a stronger back. The bent-over row is an effective back exercise that activates both upper-back muscles and lower-back muscles.', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'bent over bentover bent-over row back');";
	$sql .= "INSERT INTO Exercises VALUES (11, 'Chest Supported Row', 'Back', 'As the name suggests...', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'chest supported row back');";
	$sql .= "INSERT INTO Exercises VALUES (12, 'Lat Pulldown', 'Back', 'The lat pulldown is a fantastic exercise to strengthen the latissimus dorsi muscle, the broadest muscle in your back, which promotes good postures and spinal stability.', 'http://localhost/WebProgCwk/WebProgramming/workouts/back.html', 'lat pull down pulldown back');";

	$sql .= "INSERT INTO Exercises VALUES (13, 'Barbell Overhead Press', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'barbell overhead press shoulders');";
	$sql .= "INSERT INTO Exercises VALUES (14, 'Arnold Press', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'arnold press shoulders');";
	$sql .= "INSERT INTO Exercises VALUES (15, 'Push Press', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'push press shoulders');";
	$sql .= "INSERT INTO Exercises VALUES (16, 'Lateral Raise', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'lateral raise shoulders');";
	$sql .= "INSERT INTO Exercises VALUES (17, 'Overhead Press', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'overhead press shoulders');";
	$sql .= "INSERT INTO Exercises VALUES (18, 'Dumbbell Shoulder Push Press', 'Shoulders', '', 'http://localhost/WebProgCwk/WebProgramming/workouts/shoulders.html', 'dumbbell push press shoulders');";

	$sql .= "INSERT INTO Exercises VALUES (19, 'Diamond Push-Ups', 'Arms', 'Diamond push-ups are a more advanced variation of the classic push-up which is in a triangle(diamond) hand shape that targets fully triceps.', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'diamond push up arms');";
	$sql .= "INSERT INTO Exercises VALUES (20, 'Cable Pushdowns', 'Arms', 'A tricep pushdown is a simple exercise that uses resistance (usually from a cable machine) to work all three heads of the tricep brachii through extension of the elbow joint.', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'cable push downs arms');";
	$sql .= "INSERT INTO Exercises VALUES (21, 'Tricep Dips', 'Arms', 'Tricep Dips are an upper-body exercise that focuses on the triceps. However, you can expect them to target your pecs, anterior deltoids and muscles in your back.', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'tricep dips arms');";
	$sql .= "INSERT INTO Exercises VALUES (22, 'Barbell Curls', 'Arms', 'Barbell curls increase your upper-body strength. The barbell curl targets your biceps brachii muscle as well as the brachialis, a muscle responsible for elbow flexion.', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'barbell curls arms');";
	$sql .= "INSERT INTO Exercises VALUES (23, 'Bar Cable Curls', 'Arms', 'Cable curls target the biceps brachii. This muscle bends your elbow and rotates your forearm...', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'bar cable curls arms');";
	$sql .= "INSERT INTO Exercises VALUES (24, 'EZ Bar Preacher Curls', 'Arms', 'The EZ bar preacher curl is a great exercise to isolate the biceps, while minimizing the strain on your wrists.', 'http://localhost/WebProgCwk/WebProgramming/workouts/arms.html', 'ez bar preacher curls arms');";
	
	$sql .= "INSERT INTO Exercises VALUES (25, 'Sit-Ups', 'Abs', 'Sit-ups are a classic abdominal exercise that use your body weight to strengthen and tone the core-stabilizing abdominal muscles.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'sit ups abs');";
	$sql .= "INSERT INTO Exercises VALUES (26, 'Spiderman Plank', 'Abs', 'The spiderman plank is a bodyweight exercise that works mainly the core and the upper body.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'spiderman plank abs');";
	$sql .= "INSERT INTO Exercises VALUES (27, 'Plank', 'Abs', 'The plank is a bodyweight exercise which involves holding the trunk part of your body in a straight line off the ground.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'plank abs');";
	$sql .= "INSERT INTO Exercises VALUES (28, 'Abs Roll-out', 'Abs', 'The ab rollout is an exercise designed to target the core muscles, including the rectus abdominis, obliques, and erector spinae.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'roll out abs');";
	$sql .= "INSERT INTO Exercises VALUES (29, 'Leg Raise', 'Abs', 'The leg raise is a strength training exercise which targets the iliopsoas and are also often used to strengthen the rectus abdominis muscle, the internal and external oblique muscles.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'leg raise abs');";
	$sql .= "INSERT INTO Exercises VALUES (30, 'Reverse Crunch', 'Abs', 'The reverse crunch is an intermediate level variation of the popular abdominal crunch exercise. It exercises the full length of the deep lower abs.', 'http://localhost/WebProgCwk/WebProgramming/workouts/abs.html', 'reverse crunch abs');";
	
	$sql .= "INSERT INTO Exercises VALUES (31, 'Dumbbell Step-Up', 'Legs', 'Step-ups activate muscle groups throughout your lower body, including your quadriceps, hamstrings, glutes, and adductors. Step-ups can even out strength imbalances.', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";
	$sql .= "INSERT INTO Exercises VALUES (32, 'Calf Raise', 'Legs', 'Calf raises target the muscles on the back of your lower legs, specifically the gastrocnemius muscle that runs down your leg and the soleus muscle near your Achilles tendon. Calf raises can promote ankle stability and mobility.', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";
	$sql .= "INSERT INTO Exercises VALUES (33, 'Leg curl', 'Legs', 'The leg curl is an isolation exercise that targets the hamstrings and calf muscles. It can be performed in a variety of positions and makes a good addition to most any lower body strength training workout.', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";
	$sql .= "INSERT INTO Exercises VALUES (34, 'Leg Extension', 'Legs', 'The leg extension is a resistance weight training exercise that targets the quadriceps muscle in the legs. The exercise is done using a machine called the Leg Extension Machine.', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";
	$sql .= "INSERT INTO Exercises VALUES (35, 'Leg Press', 'Legs', 'The leg press, a type of resistance training exercise, is an excellent way to strengthen your legs...', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";
	$sql .= "INSERT INTO Exercises VALUES (36, 'Wall Sit', 'Legs', 'A wall sit is an exercise done to strengthen the quadriceps muscles. A similar physical activity is known as the jetliner position.', 'http://localhost/WebProgCwk/WebProgramming/workouts/legs.html', ' legs');";

    // execute query
	if ($con->multi_query($sql) === TRUE)
		echo "New records were inserted successfully!";
	else
		echo "Error: " . $con->error;
		
	// Close the db connection
	$con -> close();