<?php include('refresh.php') ?>
<?php include('newcomplain.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Certify | Field Engineer</title>
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
					<li> <a href="engineer.php">Approve</a></li>
					<li id="fisrtlist"><a href="certify.php">Certify</a></li>
					<li><a href="current.php">Pending Complain</a></li>
					<li><a href="history.php">Complain History</a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>

			<?php 
         $row1 = mysqli_fetch_array($certif);
    	
    	if ($row1=="") { ?>
    		<form method="post" action="certify.php">
    	<?php	echo "No Entry exists to Certify"; ?>
    		</form>
    	<?php } ?>
    	<?php while ($row1) { ?>

    		<form method="post" action="certify.php?action=add&id=<?php echo $row1['id'] ?>">	

    			<div class="input-group">
		    <label for="id" class="col-sm-2 col-form-label">Id</label>
		     <input type="text" readonly class="form-control-plaintext" id="id" name='id' value="<?php echo $row1['id']; ?>">
		    </div>
   
			<div class="input-group">
		    <label for="dept" class="col-sm-2 col-form-label">Department</label>
		     <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $row1['dept']; ?>">
		    </div>

		 	<div class="input-group">
		    <label for="ptype" class="col-sm-2 col-form-label">Problem Type</label>
		    <input type="text" readonly class="form-control-plaintext" id="ptype" value="<?php echo $row1['ptype']; ?>">
		    </div>
		 
		   	<div class="input-group">
		    <label for="description" class="col-sm-2 col-form-label">Description</label>
		   <input type="text" readonly class="form-control-plaintext" id="description" value="<?php echo $row1['description']; ?>">
		    </div>
		    <div class="input-group">
		    <label for="worker" class="col-sm-2 col-form-label">Worker</label>
		      <input type="text" readonly class="form-control-plaintext" id="worker" value="<?php echo $row1['workers']; ?>">
		    </div>
		   
			 <div class="input-group" align="center">
			 <button type="submit" class="btn" name="cert" >Certify</button>
		     </div>
              </form>
    		<?php  $row1 = mysqli_fetch_array($certif);} ?>

	
		</div>

	</div>		
		
</body>
</html>