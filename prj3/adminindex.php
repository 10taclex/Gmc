<?php include('refresh.php') ?>
<?php include('newcomplain1.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>


		<div class="">
		<div class="menu">
			
			<div class="leftmenu">
				<h4> GMC </h4>
			</div>

			<div class="rightmenu">
				<ul>
					<li id="fisrtlist"> <a href="adminindex.php">Add Member</a></li>
					<li><a href="addworker.php">ADD Worker</a></li>
					<li><a href="currentad.php">Pending Complain</a></li>
					<li><a href="historyad.php">Complain History</a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>

		<form method="post" action="adminindex.php">

 	
		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="user">
		</div>

		<div class="input-group">
			<label>Type</label>

		<select name="type">
			<option>engineer</option>
			<option>supervisor</option>
		</select>
			
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		

		<div class="input-group" align="center">
			<button type="submit" class="btn" name="reg_mem">Register</button>
		</div>

		</form>
		</div>

	</div>	

		
		
</body>
</html>