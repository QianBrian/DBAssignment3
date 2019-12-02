<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Doctor Database</title>
</head>
<body>

<?php
	$servername = "127.0.0.1";
	$username = "nativeuser";
	$password = "Goodtimesbri.25";
	$dbname = "bqian7assign2db";

	# Create connection
	$connection = mysqli_connect($servername, $username, $password, $dbname);

	# Check connection
	if (mysqli_connect_errno()) {
	     die("database connection failed :" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	    }
 ?>
<div>---Assignment 3: Brian Qian, 250962066---</div>
<h1>Welcome to the Doctor's Database</h1>

<!-- Task #1-->
<fieldset>
	<h3>Sort doctors by:</h3>
	<form method="POST" action="task1.php">
		<input type="radio" name="sort" value="firstname" checked="checked"> first name<br>
		<input type="radio" name="sort" value="lastname"> last name<br>
		<input type="submit" value="Submit" name="Submit">	<!-- This submit button fetches the sorted data -->
	</form>
</fieldset>
<!-- Task #2-->
<fieldset>
	<h3>Doctors licensed before a date.</h3>
	<form method="POST" action="task2.php">
		Input a date:
	  <input type="date" name="date">
	  <input type="submit">	<!-- This submit button fetches the sorted data -->
	</form>
</fieldset>

<!-- Task #3-->
<fieldset>
	<h3>Enter a new doctor into database.</h3>
	<form method="POST" action="task3.php">
		Input doctor information
		<div>
			Doctor ID:
			<input type="text" name="id" size="10" required>
		</div>
		<div>
			First name, last name: 	
	    	<input type="text" name="firstname" size="10">
	    	<input type="text" name="lastname" size="10">
	  	</div>
	  	<div>
	  		Speciality field:
	  		<input type="text" name="speciality" size="10">
	  		
	  	</div>
	  	<div>
	  		Date licensed:
	  		<input type="date" name="datelicensed" size="10">
	  	</div>
	  	<div>
	  		Assigned hospital:
	  		<input type="text" name="hospital" size="10">
	  		<!--
	  		<select name="hospital">
				<option value="BBC">St. Joseph Hospital, ON</option>
				<option value="ABC">Victoria Hospital, ON</option>
				<option value="DDE">Victoria Hospital, BC</option>
			</select>
		-->
	  	</div>
	  	<input type="submit">	<!-- This submit button fetches the sorted data -->
	</form>
</fieldset>

<!-- Task #4-->
<fieldset>
	<h3>Delete doctor from database.</h3>
	<label>Select a doctor to delete.</label>
	<form name='doctordropdown' method='POST' action='task4.php'>
	<select name = 'doctorlist'>
		<?php 
			$query = "SELECT * FROM doctors;";
			$result = mysqli_query($connection, $query);
			while ($row = mysqli_fetch_assoc($result)){
				echo '<option value='.$row['licensenumber'].'>'.$row['firstname'].' '.$row['lastname'].'</option>';
			}
		 ?>
		 <input type="submit" name="Delete">
	</form>
</fieldset>

<!-- Task #5-->
<fieldset>
	<h3>Update hospital name.</h3>
	<label>Select a hospital to update.</label>
	<form name='hosplist' method='POST' action='task5.php'>
		<select name='hosplist'>
			<?php 
				$query = "SELECT * FROM hospitals;";
				$result = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($result)){
					echo '<option value='.$row['hospitalcode'].'>'.$row['hospitalname'].', '.$row['cityname'].' '.$row['province'].'</option>';
				}
			 ?>
		</select>	 
		Input updated hospital name:
		<input type='text' name='newname' size='10'>
		<input type="submit" name="Delete">
	</form>
</fieldset>

<!-- Task #6 -->
<fieldset>
	<h3> Check hospital names along with head doctor.</h3>
	<form method="POST" action=task6.php>
		<input type="submit" value="Check">
	</form>
</fieldset>

<!-- Task #7 -->
<fieldset>
	<h3>Select Patient through OHIP number.</h3>
	<form method="POST" action="task7.php">	
		Please input patient OHIP number below:
		<input type='text' name='OHIP' size='10'>
		<input type='submit' value='Submit'>
	</form>
</fieldset>

<!-- Task #8 -->
<fieldset>
	<h3>Assign or remove doctor from treatment duty.</h3>
	<form method='POST' action='task8.php'>
		<input type='radio' name='action' value='assign' checked='checked'> Assign doctor to patient<br>
		<input type='radio' name='action' value='remove'> Remove doctor from patient<br>
		<input type='submit' value='Submit'>
	</form>
</fieldset>
<!-- Task #9 -->
<fieldset>
	<h3>Doctors that are currently not treating patients.</h3>
	<form method="POST" action=task9.php>
		<input type="submit" value="Check">
	</form>
</fieldset>

<!-- Task #10 Bonus -->
<fieldset>
	<h3>Doctor Gallery.</h3>
		<form method="POST" action=task10.php>
		<input type="submit" value="Enter Gallery">
	</form>
</fieldset>
</body>
</html>
