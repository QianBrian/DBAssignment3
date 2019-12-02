<?php
 
$servername = "127.0.0.1";
$username = "root";
$password = "Brirabbit.25";
$dbname = "bqian7assign2db";

# Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

# Check connection
if (mysqli_connect_errno()) {
     die("database connection failed :" . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

$id = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$spec = $_POST['speciality'];
$datelic = $_POST['datelicensed'];
$hosp = $_POST['hospital'];

# create query to insert all column information
$query = "INSERT INTO doctors (licensenumber, firstname, lastname, speciality, datelicensed, assignedhospital) VALUES ('".$id."', '".$fname."', '".$lname."', '".$spec."', '".$datelic."', '".$hosp."')";
$result = mysqli_query($connection, $query);

# if query failed, display error
if ($result === false) {
	echo mysqli_error($connection);
	echo '<fieldset>';
	echo " ---Your parameters are incorrect. Go back and try again!--- ";
	die("database query failed:" . mysqli_error($connection) . "(" . mysqli_errno($connection) . ")");
	echo '</fieldset>';
}
# if no error, then print success! If error, then display error
else {

	# query to display inserted doctor
	$newquery = "SELECT * FROM doctors WHERE licensenumber ='".$id."'";
	$newresult = mysqli_query($connection, $newquery);
	echo '<fieldset>';
	$row = mysqli_fetch_assoc($newresult);
	echo $row['firstname'].' '.$row['lastname'].' has been inserted into the database!';
	echo '</fieldset>';
}

?>