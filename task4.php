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

$id = $_POST['doctorlist'];
$_SESSION['id'] = $id;

# fetch to be deleted doctor and print out message
$newquery = "SELECT * FROM doctors WHERE licensenumber ='".$id."'";
$newresult = mysqli_query($connection, $newquery) or mysqli_error($connection);
$newrow = mysqli_fetch_assoc($newresult);
echo '<fieldset>';
echo '<div> Attempting to delete '.$newrow['firstname'].' '.$newrow['lastname'].' from database... </div>';

$treatquery = "SELECT EXISTS(SELECT * FROM assignedto WHERE doctorassigned='".$id."')";

# echo mysqli_query($connection, $treatquery) ? 'true' : 'false';

# if the doctor is currently treating a patient
if(mysqli_query($connection, $treatquery)) {
	echo "<div> Warning: This doctor is currently treating patients. </div>";
	echo "Confirm Submit?";
	echo "<form name='confirm' method='POST' action='task4a.php'>";
	echo '<input type="submit" name="Delete">';
	echo '</form>';
}
echo '</fieldset>';
echo "Click browser back button to cancel. ";
?>