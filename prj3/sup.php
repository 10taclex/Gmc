<?php include('refresh.php') ?>
<?php include('newcomplain.php')?>
<?php include('errors.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$_SESSION['userid']=$_POST['id'];
} ?>

<!DOCTYPE html>
<html>
<head>
	<title>Supervisor | GMC</title>
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
					<li id="fisrtlist"> <a href="sup.php">Approve</a></li>
					<li><a href="certifysup.php">Certify</a></li>
					<li><a href="currentsup.php">Pending Complain</a></li>
					<li><a href="historysup.php">Complain History</a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>

		<form method="post" action="sup.php">

 	<?php include('errors.php'); 

    	 $ap = mysqli_fetch_array($approvs);
    	if ($ap=="") {
    		echo "No Entry exists to Approve";
    	} else { ?>

    		<div class="input-group">
		    <label for="id" class="col-sm-2 col-form-label">Id</label>
		    <input type="text" readonly class="form-control-plaintext" id="id" name='id' value="<?php echo $ap['id']; ?>">
		    </div>
		
            <div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $ap['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $ap['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $ap['description']; ?>">
		    </div>
		  
			 <br/>
			 <div class="input-group" align="center">
			 <button type="submit" class="btn" name="apps">Approve</button>
			 <button type="submit" class="btn" name="dens">Deny</button>
		     </div>
            
         <?php } ?>


		</form>
		</div>

	</div>		
		
</body>
</html>