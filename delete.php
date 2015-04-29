<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$search_query=mysqli_query($con,"SELECT  invID
  FROM (book NATURAL JOIN ins NATURAL JOIN own NATURAL JOIN user NATURAL JOIN inventory) 
  WHERE (username = '$_POST[usernameedit]' AND password = '$_POST[passwordedit]' AND price = '$_POST[oldprice]' AND version = '$_POST[versionedit]' 
    AND conditions = '$_POST[conditionedit]' AND email = '$_POST[contactedit]'AND title = '$_POST[titleedit]'AND author = '$_POST[authoredit]'AND edition = '$_POST[editionedit]')");
if (mysqli_num_rows($search_query)==0){
  header('Location: fail.html');
  exit;
  mysqli_close($con);
}
else{
  $row = mysqli_fetch_array($search_query);
  $f1 = $row['invID'];
  $sql2="DELETE FROM inventory WHERE invID = '$f1'";
  $result = mysqli_query($con,$sql2);

  header('Location: success.html');
  exit;
#echo "1 record added";

  mysqli_close($con);
}
?>

