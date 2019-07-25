<?php include('newcomplain1.php') ?>
<?php include('refresh.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Worker | Admin</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	
		<div class="">
		<div class="menu">
			
			<div class="leftmenu">
				<h4> Guwahati Municpal Corporation </h4>
			</div>

			<div class="rightmenu">
				<ul>
					<li> <a href="adminindex.php">Add Member</a></li>
					<li id="fisrtlist"><a href="addworker.php">ADD Worker</a></li>
					<li><a href="currentad.php">Pending Complain</a></li>
					<li><a href="historyad.php">Complain History</a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>

	
	<form method="post" action="addworker.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Department</label>
			<select name="department">
				<option>Water Supply</option>
				<option>Road Management</option>
				<option>Sewage and Waste Management</option>
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
			<button type="submit" class="btn" name="reg_worker">Register</button>
		</div>	
	</form>
</div>
</div>
</body>
</html>
