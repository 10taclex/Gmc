<?php include('refresh.php') ?>
<?php include('newcomplain.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Complaint History | GMC</title>
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
					<li> <a href="adminindex.php">Add Member</a></li>
					<li><a href="addworker.php">Add Worker</a></li>
					<li><a href="currentad.php">Pending Complain</a></li>
					<li  id="fisrtlist"><a href="historyad.php">Complain History</a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>    	

    	<?php 
         $row = mysqli_fetch_array($his);
    	if ($row=="") { ?>
    		<form method="post" action="history.php">
    		<?php echo "No previous History exists"; ?>
    		</form>
    	<?php }
    	while ($row) { ?>
    		<form method="post" action="history.php">
    		<div class="input-group">
		    <label for="id" class="col-sm-2 col-form-label">ID</label>
		     <input type="text" readonly class="form-control-plaintext" id="id" value="<?php echo $row['id']; ?>">
		    </div>
   
			<div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $row['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $row['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $row['description']; ?>">
		    </div>
		  
		    <div class="input-group">
		    <label for="status" class="col-sm-2 col-form-label">Status</label>
		      <input type="text" readonly class="form-control-plaintext" id="status" value="<?php echo $row['status']; ?>">
		    </div>

		     <div class="input-group">
		    <label for="workers" class="col-sm-2 col-form-label">Workers</label>
		      <input type="text" readonly class="form-control-plaintext" id="workers" value="<?php echo $row['workers']; ?>">
		    </div>

		   	</form>
    	<?php  $row = mysqli_fetch_array($his);} ?>
		
		</div>

	</div>	
	

 
		
</body>
</html>