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

# delete query
$query = "DELETE FROM doctors WHERE licensenumber='".$_SESSION['id']."'";

# if doctor cannot be deleted, it is a head doctor likely
if (!$result = mysqli_query($connection, $query)) {
	echo '<fieldset>';
	echo "Cannot delete from database! The doctor is most likely a hospital head. ";
	echo '</fieldset>';
}
# if no error, then print success!
else {
	echo '<fieldset>';
	echo 'Success!';
	echo '</fieldset>';
}

?>