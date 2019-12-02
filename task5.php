<!DOCTYPE html>
<html>
<head>
	<title>Update hospital name.</title>
</head>
<body>
<?php
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
$newname = $_POST['newname'];
$id = $_POST['hosplist'];

# update hospital
$query = "UPDATE hospitals SET hospitalname='".$newname."' WHERE hospitalcode='".$id."'";
$result = mysqli_query($connection, $query);

$checkquery = 'SELECT EXISTS(SELECT * FROM hospitals WHERE hospitalcode="'.$id.'"';

# if query is incorrect...
if (mysqli_query($connection, $checkquery)) {
	echo "Your parameters are incorrect. Go back and try again! ";
	die("database query failed: " . mysqli_error($connection) . "(" . mysqli_errno($connection) . ")");
}
# if no error, then print success! If error, then display error
else {
	echo '<fieldset>';
	echo 'Successfully updated hospital name!';
	echo '</fieldset>';
}

?>
</body>
</html>

