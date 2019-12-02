<?php 
# session_start();
# $order = $_SESSION['connection'];
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
# echo "Connected Successfully";

$order = $_POST['sort'];
$query = "SELECT * FROM doctors ORDER BY " . $order;
$result = mysqli_query($connection, $query);
if (!$result) {
	die("databases query failed.");
}

echo '<form method="POST" action="task1a.php">';
echo 'Available Doctors: <br>';
echo '<fieldset>';
while ($row = mysqli_fetch_assoc($result)){
	echo '<input type="radio" name="doctorid" value="';
    echo $row["licensenumber"];
    echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";	
	# echo $row["firstname"] . " " . $row["lastname"];
}
echo '</fieldset>';

echo '<input type="submit" value="View Profile" name="Submit">';

echo '</form>';
?>