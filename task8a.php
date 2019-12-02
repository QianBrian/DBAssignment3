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

# query for database
$query = 'INSERT INTO assignedto (doctorassigned, patient) VALUES ("'.$doctor.'", "'.$patient.'")';
$result = mysqli_query($connection, $query);

# if error occurred...
if ($result === false) {
	echo mysqli_error($connection);
	echo "<fieldset>";
	echo "Your parameters are incorrect. Go back and try again! ";
	die("database query failed:" . mysqli_error($connection) . "(" . mysqli_errno($connection) . ")");
	echo "</fieldset>";
}

# the input works fine
else{
	echo "<fieldset>";
	echo "Doctor successfully assigned to patient. ";
	echo "</fieldset>";
}

?>
