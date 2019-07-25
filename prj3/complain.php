<?php include('refresh.php') ?>
<?php include('newcomplain.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>New Complaint</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="">
		<h1>Guwahati Muncipal Corporation</h1>
	</div>
	<div class="header">
		<h2>New Complaint</h2>
	</div>
	
<form method="post" action="complain.php">
    	<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Select Department </label>

		<select name="dept">
			<option>Water Supply</option>
			<option>Road Management</option>
			<option>Sewage and Waste Management</option>
		</select>
		</div>
		<div class="input-group">
			<label>Problem Type</label>
			<input type="text" name="ptype" value="<?php echo $ptype; ?>">
		</div>
		<div class="input-group">
			<label>Problem Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>



		<div class="input-group">
			<button type="submit" class="btn" name="submit_complain">Submit Complain</button>
		</div>
		
	

		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	</form>
		
		
 
		
</body>
</html>
