<?php
require('db.php');
require('JWT.php');

$output = [];
if(!empty($_POST)) {

	extract($_POST);

	$sql = "SELECT 1 from users where email = '$username' limit 1";
	$query = mysqli_query($conn, $sql);
	if( !mysqli_num_rows($query) ) {
		
		if( strlen($password) > 6 && $fname ) {

			$hashAndSalt = password_hash($password , PASSWORD_BCRYPT); // needed while registering
			$sql = "insert into users set password = '$hashAndSalt', fname = '$fname', lname = '$lname', email = '$username' ";
			if( mysqli_query($conn, $sql) ) {
				$id = mysqli_insert_id( $conn );
				$output = [ 'token' => login_jwt( ['id'=>$id, 'name' => $fname ] ) ];
			}

		} else {
			$output = ['error'=>'Not Valid Password!!!'];
		}

	} else{
		$output = ['error'=>'Username already registered!!!'];
	}

} else {
	$output = ['error'=>'Invalid input: Name, Username, Password!!!'];
}
echo json_encode($output);
?>