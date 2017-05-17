<?php

$key = 'Octaviasecretkey';

$header = [
           'typ' => 'JWT',
		   'alg' => 'HS256'
		  ];

$header = json_encode($header);		
$header = base64_encode($header);


$payload = [      
		"country" => "Romania",
		"name" => "Octavia-Anghel",
		"email" => "octaviaanghel@gmail.com"
		  ];

$payload = json_encode($header);		
$payload = base64_encode($header);

// Generates a keyed hash value using the HMAC method
$signature = hash_hmac('sha256','$header.$payload', $key, true);

//base64 encode the signature
$signature = base64_encode($signature);

//concatenating the header, the payload and the signature to obtain the JWT token
$token = "$header.$payload.$signature";
echo $token;


//-------------------COmpressed---->

// base64 encodes the header json
$encoded_header = base64_encode('{"alg": "HS256","typ": "JWT"}');

// base64 encodes the payload json
$encoded_payload = base64_encode('{"country": "Romania","name": "Octavia Anghel","email": "octaviaanghel@gmail.com"}');

// base64 strings are concatenated to one that looks like this
$header_payload = $encoded_header . '.' . $encoded_payload;

//Setting the secret key
$secret_key = 'Octaviasecretkey';

// Creating the signature, a hash with the s256 algorithm and the secret key. The signature is also base64 encoded.
$signature = base64_encode(hash_hmac('sha256', $header_payload, $secret_key, true));

// Creating the JWT token by concatenating the signature with the header and payload, that looks like this:
$jwt_token = $header_payload . '.' . $signature;

//listing the resulted  JWT
echo $jwt_token;
?>


?> 