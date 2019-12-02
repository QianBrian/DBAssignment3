<!DOCTYPE html>
<html>
<head>
<h3>Doctor Gallery</h3>	
</head>
<body>
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

$query = "SELECT * FROM doctors";
$result = mysqli_query($connection, $query);

# $updatequery = "UPDATE FROM doctors SET docimage="
echo "<title>Doctor's Gallery</title>";

# echo out all doctor profile pictures... default picture is assigned if no image available
while ($row = mysqli_fetch_assoc($result)){
    echo "<fieldset>";
    echo '<form style="display:flex;justify-content:left;align-items:center;" method="POST" action="task10a.php">';
    echo 'Edit Dr. '.$row['lastname']. '\'s photo. ';
    echo 'Input URL: <input type="text" id="urlinput" name="'.$row["licensenumber"].'pic" size="10">';
    echo '<input type="submit" value="Submit URL" name="Submit">';
    echo '<input id="id" name="id" type="hidden" value="'.$row['licensenumber'].'">';
    echo '</form>';
    echo '<img id="currentPhoto" src="'.$row['docimage'].'" onerror="this.onerror=null; this.src=\'noprofilepic.jpg\'" alt="" width="100" height="120">';
    echo "</fieldset>";
}

?>
	

</body>
</html>