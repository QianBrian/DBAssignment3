<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL); 
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

$doctor = $_POST['doctor'];
$patient = $_POST['patient'];

# delete query
$query = 'DELETE FROM assignedto WHERE doctorassigned="'.$doctor.'" AND patient="'.$patient.'"';
$result = mysqli_query($connection, $query);

# query to check if delete query worked
$checkquery = "SELECT EXISTS(SELECT * FROM assignedto WHERE doctorassigned='".$doctor."' AND patient='".$patient."') AS 'test'";
$checkresult = mysqli_query($connection, $checkquery);

# if error occurred
if ($result === false) {
	echo mysqli_error($connection);
	echo "<fieldset>";
	echo "Your parameters are incorrect, or the doctor is currently not treating the specified patient. Go back and try again! ";
	die("database query failed:" . mysqli_error($connection) . "(" . mysqli_errno($connection) . ")");
	echo "</fieldset>";
}

# query was successful
else{
	echo "<fieldset>";
	echo "Operation successful! ";
	echo "</fieldset>";
}

?>