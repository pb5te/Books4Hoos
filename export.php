<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$username_query=mysqli_query($con,"SELECT  username
	FROM user
	WHERE isadmin = 1 AND (username = '$_POST[username]' AND password = '$_POST[password]')");

if (mysqli_num_rows($username_query)==0){
	header('Location: fail.html');
	exit;
	mysqli_close($con);
}
else{
	header('Content-disposition: attachment; filename=file.json');
	header('Content-type: application/json');
	echo "/**
	Export to JSON
	Peter Bahng - pb5te
	Alexander Kim - atk5er
	Christopher Yun - cky5zc
 */";


	echo "// Database 'cs4750cky5zc'\n\n";
	echo "// cs4750cky5zc.book\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM book");




	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";

	echo "\n\n// cs4750cky5zc.user\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM user");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";

	echo "\n\n// cs4750cky5zc.inventory\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM inventory");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";

	echo "\n\n// cs4750cky5zc.cart\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM cart");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";



	echo "\n\n// cs4750cky5zc.class\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM class");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";



	echo "\n\n// // cs4750cky5zc.has\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM has");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";

	echo "\n\n// cs4750cky5zc.have\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM has");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";



	echo "\n\n// cs4750cky5zc.ins\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM has");

	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";echo "\n\n// cs4750cky5zc.own\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM has");

	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";



	echo "\n\n// cs4750cky5zc.require\n\n";
	$search_query=mysqli_query($con, "SELECT * FROM has");
	echo "[";
	while ($row = mysqli_fetch_array($search_query)) {
		echo json_encode($row);
	}echo "]";


}
?>