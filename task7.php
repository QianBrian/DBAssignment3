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

$OHIP = $_POST['OHIP'];
# echo $OHIP;

# join query
$query = "SELECT p.ohipnumber AS OHIP, p.firstname AS pfirstname, p.lastname AS plastname, d.firstname AS dfirstname, d.lastname AS dlastname FROM patients p JOIN assignedto a ON p.ohipnumber=a.patient JOIN doctors d ON a.doctorassigned=d.licensenumber WHERE p.ohipnumber='".$OHIP."'";
$result = mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);

# query to test success of operation
$checkquery = 'SELECT EXISTS('.$query.') as "test"';
$checkresult = mysqli_query($connection, $checkquery);


# if patient is found within the assignedto table...
if (mysqli_fetch_assoc($checkresult)['test'] === '1'){
	echo "<fieldset>";
	echo "Doctors treating patient ".$row['pfirstname']." ".$row['plastname']." (".$row['OHIP']."): ";

	# reset pointer
	mysqli_data_seek($result,0);

	# iterate through doctors
	while($row=mysqli_fetch_assoc($result)){
		echo '<li>';
		echo $row['dfirstname'].' '.$row['dlastname'];
		echo '</li>';
	}
	echo "</fieldset>";
}

# if patient is not being treated...
else{
	echo "<fieldset>";
	echo 'Patient is currently not being treated. ';
	echo "</fieldset>";
}

?>