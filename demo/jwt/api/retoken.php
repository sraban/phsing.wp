<?php
	require('JWT.php');
	$token = @$_REQUEST['token'];
	if($token){
		$o = varify_jwt( $token );
		$output = [ 'token' => $o[0], 'info' => $o[1] ];
		echo json_encode($output);
	}
?>