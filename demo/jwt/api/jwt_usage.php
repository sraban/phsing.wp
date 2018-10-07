<?php
$secretKey = base64_decode('sraban');
$serverName = 'http://localhost/'; /// set your domain name 
define('SECRET_KEY', $secretKey );
define('SERVER_NAME', $serverName );

function login_jwt($user_data) {

    $tokenId    = base64_encode(mcrypt_create_iv(32));
    $issuedAt   = time();
    $notBefore  = $issuedAt + 10;  //Adding 10 seconds
    $expire     = $notBefore + 7200; // Adding 2 hr
    $data = [
                'iat'  => $issuedAt,         // Issued at: time when the token was generated
                'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
                'iss'  => SERVER_NAME,       // Issuer
                'nbf'  => $notBefore,        // Not before
                'exp'  => $expire,           // Expire
                'data' => $user_data
            ];

    $token = JWT::encode($data, SECRET_KEY);
    return $token;
}

function varify_jwt($token) {
    
    $data = JWT::decode($token, SECRET_KEY);
    if( $data->exp > time() && $data->iss == SERVER_NAME ) {
        $issuedAt   = time();
        $notBefore  = $issuedAt + 10;  //Adding 10 seconds
        $expire     = $notBefore + 7200; // Adding 2 hr
        $data->nbf = $notBefore;
        $data->exp = $expire;
        $user_data = $data->data;
        $new_token = JWT::encode($data, SECRET_KEY);
        return [ $new_token, $user_data ];
    }
}
?>