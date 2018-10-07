<?php
require('db.php');
require('JWT.php');

$output = [];
if(!empty($_POST)) {

	extract($_POST);

	$sql = "SELECT password,id,fname from users where email = '$username' limit 1";
	$query = mysqli_query($conn, $sql);
	if( mysqli_num_rows($query) ) {
		$row = mysqli_fetch_row($query);
		

		if($password) {
			$hashAndSalt = password_hash($password , PASSWORD_BCRYPT); // needed while registering
			if( password_verify( $password, $row[0]) ) {
				$output = [ 'token' => login_jwt( ['id'=>$row[1], 'name' => $row[2] ] ) ]; 
			}
		} else {
			$output = ['error'=>'Not Valid Password!!!'];
		}

	} else{
		$output = ['error'=>'Not Valid User!!!'];
	}

} else {
	$output = ['error'=>'Invalid Credentials: Username, Password!!!'];
}
echo json_encode($output);
?>