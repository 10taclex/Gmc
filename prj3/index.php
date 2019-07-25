<?php include('refresh.php') ?>
<?php include('newcomplain.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Citizen | GMC </title>
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
					<li id="fisrtlist"> <a href="index.php">New Complain</a></li>
					<li><a href="complain_current.php">Pending Complaint </a></li>
					<li><a href="complain_history.php">Complaint History </a></li>
					<li><a href="index.php?logout=1">Logout</a></li>
					
				</ul>
			</div>

		</div>
	
		<div>

		<form method="post" action="index.php">

	<?php include('errors.php'); ?>

		<div class="input-group">
			<label >Select Department </label>
		<select  name = "dept" id="dept" onchange="ChangeCarList()"> 
		  <option value="">-- Select Department --</option> 
		  <option value="Water Supply">Water Supply</option> 
		  <option value="Road Management">Road Management</option> 
		  <option value="Sewage and Waste Management">Sewage and Waste Management</option> 
		</select> 
		</div>
		

		
		<div class="input-group">
			<label >Select Problem </label>

			<select name = "ptype" id="ptype" value="">
			<option value="">-- Select Problem Type --</option>
			</select> 
		<script>
		var carsAndModels = {};
		carsAndModels['Water Supply'] = ['-- Select Problem Type --','Pipeline Blockage', 'Pipeline Leakage'];
		carsAndModels['Road Management'] = ['-- Select Problem Type --','Potholes', 'Cleaning', 'Reconstruction', 'Speed Breaker'];
		carsAndModels['Sewage and Waste Management'] = ['-- Select Problem Type --','Drainage Leakage', 'Drainage Cleaning','Drainage Repair','Manhole','Dead Animal', 'Dustbin Installation'];

		function ChangeCarList() {
		    var carList = document.getElementById("dept");
		    var modelList = document.getElementById("ptype");
		    var selCar = carList.options[carList.selectedIndex].value;
		    while (modelList.options.length) {
		        modelList.remove(0);
		    }
		    var cars = carsAndModels[selCar];
		    if (cars) {
		        var i;
		        for (i = 0; i < cars.length; i++) {
		            var car = new Option(cars[i], cars[i]);
		            modelList.options.add(car);
		        }
		    }
		} 
		</script>
		</div>
		<div class="input-group">
			<label>Problem Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>



		<div class="input-group" align="center">
			<button type="submit" class="btn" name="submit_complain">Submit Complain</button>
		</div>

		</form>
		</div>

	</div>
	
		
		
</body>
</html>
