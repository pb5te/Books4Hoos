<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="INSERT INTO user (username, password, zipCode, streetAddress, email, isAdmin)
VALUES
('$_POST[username]','$_POST[password]','$_POST[zipcode]', '$_POST[streetaddress]','$_POST[email]', '0')";

if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
} else {
	header('Location: success.html');
	exit;
}
#echo "1 record added";

mysqli_close($con);
?>





