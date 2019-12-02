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

# create select query for desired data
$query = "SELECT h.hospitalname, d.firstname, d.lastname, d.datelicensed FROM hospitals h JOIN doctors d ON h.assignedhead=d.licensenumber ORDER BY h.hospitalname";
$result = mysqli_query($connection, $query);

# iterate through all desired data and output as list
echo '<fieldset>';
while($row = mysqli_fetch_assoc($result)){
	echo "<li>";
	echo $row['hospitalname']." Hospital assigned head doctor: ".$row['firstname']." ".$row['lastname'].", licensed on ".$row['datelicensed'];
	echo "</li>";
}
echo '</fieldset>';
?>
