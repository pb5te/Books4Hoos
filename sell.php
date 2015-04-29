<?php
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$username_query=mysqli_query($con,"SELECT  username
	FROM user
	WHERE (username = '$_POST[username]' AND password = '$_POST[password]')");

if (mysqli_num_rows($username_query)==0){
	header('Location: fail.html');
	exit;
	mysqli_close($con);
}
else{
	$userrow = mysqli_fetch_array($username_query);
	$userID = (string)$userrow['username'];
	$nextinvIDquery = mysqli_query($con,"SELECT invID from inventory WHERE invID = (SELECT MAX(invID) FROM inventory)");
	$rowInv = mysqli_fetch_array($nextinvIDquery);
	$nextinvID = $rowInv['invID']+1;
	mysqli_query($con,"INSERT INTO inventory 

		VALUES ('$nextinvID', '$_POST[price]', '$_POST[version]', '0', 'New')");

	$bookIDquery = mysqli_query($con,"SELECT bookID FROM book 
		WHERE title = '$_POST[title]' AND author = '$_POST[author]' AND edition = '$_POST[edition]'");

	if (mysqli_num_rows($bookIDquery)==0)
	{
		$nextbookIDquery = mysqli_query($con,"SELECT bookID from book WHERE bookID = (SELECT MAX(bookID) FROM book)");
		$rowBook = mysqli_fetch_array($nextbookIDquery);
		$nextbookID = $rowBook['bookID']+1;
		mysqli_query($con,"INSERT INTO book 
			VALUES ('$nextbookID', '$_POST[title]', '$_POST[author]', '$_POST[edition]')");
	}
	else{
		$rowBook = mysqli_fetch_array($bookIDquery);
		$nextbookID = $rowBook['bookID'];
	}
	mysqli_query($con,"INSERT INTO ins VALUES ('$nextbookID', '$nextinvID')");
	mysqli_query($con,"INSERT INTO own VALUES ('$userID', '$nextinvID')");
	header('Location: success.html'); 
	exit;
	mysqli_close($con);
}
?>