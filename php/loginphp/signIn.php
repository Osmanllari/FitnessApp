<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name_li'];
		$user_password = $_POST['user_password_li'];

		if(!empty($user_name) && !empty($user_password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);


					if(password_verify($user_password, $user_data['user_password'])) 
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ../../index.php");
						die;
					}
				}
			}
			
			$_SESSION["message"] = "wrong username or password!";
			header('Location: ../../login.php');
		}else
		{
			$_SESSION["message"] = "wrong username or password!";
			header('Location: ../../login.php');
		}
	}

?>