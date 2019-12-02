<?php 
session_start();
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
$imagelink = $_POST[$id.'pic'];
$query = "UPDATE doctors SET docimage='".$imagelink."' WHERE licensenumber='".$id."'";
$result = mysqli_query($connection, $query);

# image upload failed
if ($result === false) {
	echo mysqli_error($connection);
	echo "Your parameters are incorrect. Go back and try again! ";
	die("database query failed:" . mysqli_error($connection) . "(" . mysqli_errno($connection) . ")");
}

# operation worked, image uploaded
else {
	echo "<img src='".$imagelink."' alt='Doctor Image'>";
	echo '<br>';
	echo "Image has been uploaded. ";
	
}