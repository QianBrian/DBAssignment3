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

$task = $_POST['action'];


if($task === 'assign'){
	echo '<form method="POST" action="task8a.php">';
	echo 'Assign Dr. ';
	echo '<select name="doctor">';
	$query = "SELECT * FROM doctors;";
		$result = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($result)){
			echo '<option value='.$row['licensenumber'].'>'.$row['firstname'].' '.$row['lastname'].'</option>';
		}
	echo '</select>';
	echo ' to patient: ';
	echo '<input type="text" name="patient">';
	echo '<input type="submit" value="Submit">';
	echo '</form>';
	# $_SESSION['doctor'] = $_POST['doctor'];
	# $_SESSION['patient'] = $_POST['patient'];
	echo $_SESSION['doctor'];
}

elseif ($task === 'remove') {
	echo '<form method="POST" action="task8b.php">';
	echo 'Remove Dr. ';
	echo '<select name="doctor">';
	$query = "SELECT * FROM doctors;";
		$result = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($result)){
			echo '<option value='.$row['licensenumber'].'>'.$row['firstname'].' '.$row['lastname'].'</option>';
		}
	echo '</select>';
	echo ' from treatment for: ';
	echo '<select name="patient">';
	$query = "SELECT * FROM patients;";
		$result = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($result)){
			echo '<option value='.$row['ohipnumber'].'>'.$row['firstname'].' '.$row['lastname'].'</option>';
		}
	echo '</select>';
	echo '<input type="submit" value="Submit">';
	echo '</form>';
}

else{
	echo 'An error has occurred. Click your browser back button to go back. ';
}

?>