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

$doctorid = $_POST['doctorid'];
$doctorselected = "SELECT * FROM doctors WHERE licensenumber = '" . $doctorid . "'";
$result = mysqli_query($connection, $doctorselected);
$row = mysqli_fetch_assoc($result);

echo '<table style="width:100%">
	<style>
		th, td{
			border: 1px solid black;
		}
		.tablecell{
			text-align: center;
  			vertical-align: middle;
		}
	</style>
	<tr>
		<th>Doctor ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Speciality</th>
		<th>Date Licensed</th>
		<th>Assigned Hospital</th>
	</tr>

	<tr>
		<td class="tablecell">'.$doctorid.'</td>
		<td class="tablecell">'.$row['firstname']. '</td>
		<td class="tablecell">'.$row['lastname']. '</td>
		<td class="tablecell">'.$row['speciality']. '</td>
		<td class="tablecell">'.$row['datelicensed']. '</td>
		<td class="tablecell">'.$row['assignedhospital'].'</td>
	</tr>
	</table>'
 ?>

<!-- if there are more than two of the same doctors, ask which one to return -->