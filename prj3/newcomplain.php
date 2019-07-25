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
	$username=$_SESSION['username'];
	$id=$_SESSION['userid'];
	//$id="1";
	
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	 $query = "SELECT * FROM complain WHERE username='$username' AND status !='Completed' AND status!='Denied'";
     $rescurr = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE username='$username' AND (status='Completed' OR status='Denied')";
     $reshis = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status='Completed' OR status='Denied'";
     $his = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status !='Completed' AND status!='Denied'";
     $curr = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='In Queue'";
     $approv = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND workers !='not allotted'";
     $certif = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Approved by Engineer'";
     $approvs = mysqli_query($db, $query);

     $query = "SELECT * FROM complain WHERE status ='Certified by Engineer'";
     $certifs = mysqli_query($db, $query);

      // aprove
	if (isset($_POST['app'])) {
		$quer = "UPDATE complain SET status='Approved by Engineer' WHERE id='$id'";
			mysqli_query($db, $quer);
			header('location: engineer.php');
	}
	    
      // Deny
	if (isset($_POST['den'])) {
		$quer = "UPDATE complain SET status='Denied' WHERE id='$id'";
			mysqli_query($db, $quer);
			header('location: engineer.php');
	}

	//certify
	if (isset($_POST['cert'])) {
		$i=$_POST['id'];
		$quer = "UPDATE complain SET status='Certified by Engineer' WHERE id='$i'";
			mysqli_query($db, $quer);	
			header('location: certify.php');
	}

	   // aprovesup
	if (isset($_POST['dens'])) {
		$quer = "UPDATE complain SET status='Denied' WHERE id='$id'";
			mysqli_query($db, $quer);
			header('location: sup.php');

		}

	   // aprove
	if (isset($_POST['apps'])) {
		$quer = "UPDATE complain SET status='Approved by Supervisor' WHERE id='$id'";
			mysqli_query($db, $quer);





           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Water Supply' AND workers='not allotted'";
           $allotworker = mysqli_query($db, $query);
            $temp=0;
       
       	while ($temp==0 ) { $data = mysqli_fetch_array($allotworker);

			               $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Water Supply'";
			               $freeworker = mysqli_query($db, $query);
			               $free=mysqli_num_rows($freeworker);
			               $id1=$data['id'];

			           if($data['ptype']=="Pipeline Blockage" && $free >=5 ){
				           	$quer = "UPDATE complain SET workers='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							} 
							    $temp=0;
			           }
		
			           else if($data['ptype']=="Pipeline Leakage" && $free >=3){
				           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
							mysqli_query($db, $quer);

							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }
				           		$temp=0;
			           }
			           else{
			           	$temp=1;
			           }
        	}   	


           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Road Management' AND workers= 'not allotted'";
           $allotworker = mysqli_query($db, $query);
         
           $temp=0;
 		
 		while($temp==0) { 
		 			 $data = mysqli_fetch_array($allotworker);
		           
		           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Road Management'";
		           $freeworker = mysqli_query($db, $query);
		           $free=mysqli_num_rows($freeworker);
		           $id1=$data['id'];

			           if($data['ptype']=="Potholes" && $free >=7 ){
			           	$quer = "UPDATE complain SET workers='7' WHERE id=' $id1' ";
						mysqli_query($db, $quer);
							while($temp<7) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							}   $temp=0;

			           }
			           else if($data['ptype']=="Cleaning" && $free >=3){
			           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
						mysqli_query($db, $quer);
					
							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }

			           else if($data['ptype']=="Reconstruction" && $free >=20){
			           	$quer = "UPDATE complain SET workers='20' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<20) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }


			            else if($data['ptype']=="Speed Breaker" && $free >=5){
			           	$quer = "UPDATE complain SET workers='5' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }
			           else{
			           	$temp=1;
			           }

			}        



          
           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Sewage and Waste Management' AND workers='not allotted'";
           $allotworker = mysqli_query($db, $query);
           $temp=0;

           while($temp==0){
				           $data = mysqli_fetch_array($allotworker);
				          
				           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Sewage and Waste Management'";
				           $freeworker = mysqli_query($db, $query);
				           $free=mysqli_num_rows($freeworker);
				           $id1=$data['id'];
				           

				           if($data['ptype']=="Manhole" && $free >=5 ){
				           	$quer = "UPDATE complain SET workers='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
								while($temp<5) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
								}   $temp=0;

				           }
				           else if($data['ptype']=="Drainage Leakage" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
						
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }	$temp=0;
				           }

				           else if($data['ptype']=="Drainage Cleaning" && $free >=7){
				           	$quer = "UPDATE complain SET workers='7' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
								while($temp<7) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				            else if($data['ptype']=="Drainage Repair" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dead Animal" && $free >=4){
				           	$quer = "UPDATE complain SET workers='4' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<4) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dustbin Installation" && $free >=6){
				           	$quer = "UPDATE complain SET workers='6' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
							{ array_push($errors, "required"); }
								while($temp<6) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }   $temp=0;
				           }
				           else{
				           	$temp=1;
				           }
				 }          


			header('location: sup.php');


	}


	    // aprove
	if (isset($_POST['certs'])) {

		$id=$_POST['id'];

		$quer = "UPDATE complain SET status='Completed' WHERE id='$id'";
			mysqli_query($db, $quer);	


        $quer = "UPDATE worker SET isfree='Yes' WHERE workid='$id'";
			mysqli_query($db, $quer);	
			 $quer = "UPDATE worker SET workid='' WHERE workid='$id'";
			mysqli_query($db, $quer);	
 		


   $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Water Supply' AND workers='noy allotted'";
           $allotworker = mysqli_query($db, $query);
            $temp=0;
       
       	while ($temp==0 ) { $data = mysqli_fetch_array($allotworker);

			               $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Water Supply'";
			               $freeworker = mysqli_query($db, $query);
			               $free=mysqli_num_rows($freeworker);
			               $id1=$data['id'];

			           if($data['ptype']=="Pipeline Blockage" && $free >=5 ){
				           	$quer = "UPDATE complain SET workers='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							} 
							    $temp=0;
			           }
		
			           else if($data['ptype']=="Pipeline Leakage" && $free >=3){
				           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
							mysqli_query($db, $quer);

							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }
				           		$temp=0;
			           }
			           else{
			           	$temp=1;
			           }
        	}   	


           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Road Management' AND workers='noy allotted'";
           $allotworker = mysqli_query($db, $query);
         
           $temp=0;
 		
 		while($temp==0) { 
		 			 $data = mysqli_fetch_array($allotworker);
		           
		           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Road Management'";
		           $freeworker = mysqli_query($db, $query);
		           $free=mysqli_num_rows($freeworker);
		           $id1=$data['id'];

			           if($data['ptype']=="Potholes" && $free >=7 ){
			           	$quer = "UPDATE complain SET workers='7' WHERE id=' $id1' ";
						mysqli_query($db, $quer);
							while($temp<7) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
							}   $temp=0;

			           }
			           else if($data['ptype']=="Cleaning" && $free >=3){
			           	$quer = "UPDATE complain SET workers='3' WHERE id='$id1'";
						mysqli_query($db, $quer);
					
							while($temp<3) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }

			           else if($data['ptype']=="Reconstruction" && $free >=20){
			           	$quer = "UPDATE complain SET workers='20' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<20) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }


			            else if($data['ptype']=="Speed Breaker" && $free >=5){
			           	$quer = "UPDATE complain SET workers='5' WHERE id='$id1'";
						mysqli_query($db, $quer);
						
							while($temp<5) {
								$work = mysqli_fetch_array($freeworker);
								$id2=$work['id'];
								$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
								$temp=$temp+1;
				           }    $temp=0;
			           }
			           else{
			           	$temp=1;
			           }

			}        



          
           $query = "SELECT * FROM complain WHERE status ='Approved by Supervisor' AND dept='Sewage and Waste Management' AND workers='noy allotted'";
           $allotworker = mysqli_query($db, $query);
           $temp=0;

           while($temp==0){
				           $data = mysqli_fetch_array($allotworker);
				          
				           $query = "SELECT * FROM worker WHERE isfree ='Yes' AND department='Sewage and Waste Management'";
				           $freeworker = mysqli_query($db, $query);
				           $free=mysqli_num_rows($freeworker);
				           $id1=$data['id'];
				           

				           if($data['ptype']=="Manhole" && $free >=5 ){
				           	$quer = "UPDATE complain SET workers='5' WHERE id=' $id1' ";
							mysqli_query($db, $quer);
								while($temp<5) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
								}   $temp=0;

				           }
				           else if($data['ptype']=="Drainage Leakage" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
						
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }	$temp=0;
				           }

				           else if($data['ptype']=="Drainage Cleaning" && $free >=7){
				           	$quer = "UPDATE complain SET workers='7' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
								while($temp<7) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				            else if($data['ptype']=="Drainage Repair" && $free >=10){
				           	$quer = "UPDATE complain SET workers='10' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<10) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dead Animal" && $free >=4){
				           	$quer = "UPDATE complain SET workers='4' WHERE id='$id1'";
							mysqli_query($db, $quer);
								while($temp<4) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }    $temp=0;
				           }

				             else if($data['ptype']=="Dustbin Installation" && $free >=6){
				           	$quer = "UPDATE complain SET workers='6' WHERE id='$id1'";
							mysqli_query($db, $quer);
							
							{ array_push($errors, "required"); }
								while($temp<6) {
									$work = mysqli_fetch_array($freeworker);
									$id2=$work['id'];
									$quer = "UPDATE worker SET isfree='No' WHERE id='$id2'";
									mysqli_query($db, $quer);
									$quer = "UPDATE worker SET workid='$id1' WHERE id='$id2'";
								mysqli_query($db, $quer);
									$temp=$temp+1;
					           }   $temp=0;
				           }
				           else{
				           	$temp=1;
				           }
				 }          


			header('location: certifysup.php');
	}


// go to complain
	if (isset($_POST['complain_user'])) {
		header('location: complain.php');
	}


	//go to comlain history
	if (isset($_POST['complain_history'])) {
		
		header('location: complain_history.php');
	}

	//go to current comlain
	if (isset($_POST['complain_current'])) {

		header('location: complain_current.php');
	}

	//add member
	if (isset($_POST['add_member'])) {

		header('location: addmember.php');
	}


	//add worker
	if (isset($_POST['add_worker'])) {

		header('location: addworker.php');
	}

	//approve
	if (isset($_POST['approvesup'])) {

		header('location: aprovesup.php');
	}

	//certify
	if (isset($_POST['certifysup'])) {

		header('location: certifysup.php');
	}


	//approve
	if (isset($_POST['approve'])) {

		header('location: aprove.php');
	}

	//certify
	if (isset($_POST['certify'])) {

		header('location: certify.php');
	}



	//go to history
	if (isset($_POST['history'])) {

		header('location: history.php');
	}

	//go to current 
	if (isset($_POST['current'])) {

		header('location: current.php');
	}




	// REGISTER USER complain
	if (isset($_POST['submit_complain'])) {

		// receive all input values from the form
		$dept = mysqli_real_escape_string($db, $_POST['dept']);
		$ptype = mysqli_real_escape_string($db, $_POST['ptype']);
		$description = mysqli_real_escape_string($db, $_POST['description']);
		$address = mysqli_real_escape_string($db, $_POST['address']);

		// form validation: ensure that the form is correctly filled
		if (empty($dept)) { array_push($errors, "Department is required"); }
		if (empty($ptype)) { array_push($errors, "Problem type is required"); }
		if (empty($description)) { array_push($errors, "Problem description is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }

		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO complain (username, dept, ptype, description,address) 
					  VALUES('$username' ,'$dept', '$ptype', '$description','$address')";
			mysqli_query($db, $query);

			header('location: index.php');
		}

	}
?>