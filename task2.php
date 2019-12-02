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

# date var
$datesort = $_POST['date'];
$query = "SELECT * FROM doctors WHERE datelicensed <'" .$datesort. "'";
$result = mysqli_query($connection, $query);

echo "Doctors licensed before " . $datesort . ":";
echo "<fieldset>";

# iterate through all doctors licensed before the date
while ($row = mysqli_fetch_assoc($result)){
    echo "<li>";
    echo $row["licensenumber"] . " - ". $row["firstname"] . " " . $row["lastname"];
    echo "</li>";
}

echo "</fieldset>";