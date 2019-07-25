<?php 
	// variable declaration
	$username="";
	$user="";
	$row="";
	$dept ="";
	$email="";
	$department="";
	$type="";
	$ptype="";
	$description="";
	$address="";
	$status="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	

	// REGISTER USER
	if (isset($_POST['reg_mem'])) {
		// receive all input values from the form
		$user = mysqli_real_escape_string($db, $_POST['user']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($user)) { array_push($errors, "Username is required"); }
		if (empty($type)) { array_push($errors, "Type is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

	        $query = "SELECT * FROM users WHERE username='$user'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {

			$password = md5($password_1);//encrypt the password before saving in the database
			$quer = "INSERT INTO users (username, email, password,type) 
					  VALUES('$user', '$email', '$password', '$type')";
			mysqli_query($db, $quer);

			header('location: adminindex.php');
		}else{
			array_push($errors, "Username already exists");
		}
		}

	}

	// ... 



// REGISTER worker
	if (isset($_POST['reg_worker'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$department = mysqli_real_escape_string($db, $_POST['department']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($department)) { array_push($errors, "Department is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

	        $query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 0) {

			$password = md5($password_1);//encrypt the password before saving in the database
			$quer = "INSERT INTO users (username, email, password,type) 
					  VALUES('$username', '$email', '$password', 'worker')";
			mysqli_query($db, $quer);
			$quer = "INSERT INTO worker (username, department) 
					  VALUES('$username', '$department')";
			mysqli_query($db, $quer);

			header('location: addworker.php');
		}else{
			array_push($errors, "Username already exists");
		}
		}

	}

	// ... 


	?>