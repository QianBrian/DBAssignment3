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

# query 
$query = "SELECT d.firstname, d.lastname, d.licensenumber FROM doctors d LEFT JOIN assignedto a ON d.licensenumber=a.doctorassigned WHERE a.doctorassigned IS NULL";
$result = mysqli_query($connection, $query);

echo "Doctors currently not treating patients: ";
echo "<fieldset>";

# iterate all desired data from query
while ($row = mysqli_fetch_assoc($result)){
    echo "<li>";
    echo $row["licensenumber"] . " - ". $row["firstname"] . " " . $row["lastname"];
    echo "</li>";
}
echo "</fieldset>";
?>