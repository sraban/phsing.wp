<?php
if(!empty($_POST)) {
	require('db.php');
	require('JWT.php');
	extract($_POST);
	$sql = "insert into saved_locations set city = '$city', country = '$country', state = '$state', address='$address', zip = '$zip',latitude='$latitude',longitude='$longitude'
	";
	$query=mysqli_query($conn, $sql);
}
print_r($_POST);
?>