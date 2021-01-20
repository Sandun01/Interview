<?php

    include_once '../bizlogic/config.php';

	session_start();

	if (isset($_POST['submit'])) {

		$errors = array();

		if (!isset($_POST['username']) || strlen(trim($_POST['username'])) <= 1){
			$errors[] = "username is missing or invalid";

}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) <= 1){
			$errors[] = "password is missing or invalid";

}
		//check if there are any errors in the form
		if(empty($errors)){

			$username = mysqli_real_escape_string($connection,$_POST['username']);

			$password = mysqli_real_escape_string($connection,$_POST['password']);
			$hashed_password = sha1($password);

		//prepare database query
		$query = "SELECT *FROM user
				  WHERE username = '{$username}'
				  AND password = '{$password_hash}'
				  LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set){

			if(mysqli_num_rows($result_set) == 1){

				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_ID'] = $user['id'];

				header('Location: ../ui/userlist.php');
			}else{

				$errors[] = 'Invalid username or password';
			}
		}else{
			$errors[] = 'database query failed';
		}
			}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
        <style></style>
    </head>


    <body>
        
        <h1 style="color: blue; text-align: center;">User Login</h1>

        <form method="POST" action="login.php">

            <label>Userame</label><input type="text" name="username" required>
            <label>Password</label><input type="password" name="password" required>

            <input type="submit" value="login" required>
            
        </form>


        <?php
	        if (isset($errors) && !empty($errors)){
		    echo '<h3>Invalid Username / Password</h3>';
	        }
	    ?>

    </body>

</html>


