<?php
/* JSON Web Token (JWT) is a JSON-based open standard used to create access tokens that assert some number of claims. 
In a palpable example, the JWT represents a key between a server-client relation: the server generates a token that has the claim "logged in as admin" and give it to a client, 
which could use that token to prove that is logged in as admin. The tokens are designed to be compact, URL-safe and can also be authenticated or encrypted.


JSON Web Tokens commonly consist of three parts: a header, a payload and a signature. 
The header identifies which algorithm is used to generate the signature, and looks something like this
 
    header = '{"alg":"HS256","typ":"JWT"}'

HS256 indicates that this token is signed using HMAC-SHA25
The payload contains the claims that we wish to make:

    payload = '{"loggedInAs":"admin","iat":1422779638}

The signature is calculated by base64url encoding the header and payload and then concatenating them with a period as a separator: 

    key = 'secretkey'
    unsignedToken = encodeBase64(header) + '.' + encodeBase64(payload)
    signature = HMAC-SHA256(key, unsignedToken)  

As we said above, the final token represents the base64url encoded signature, and couple together the three parts using periods:

token = encodeBase64(header) + '.' + encodeBase64(payload) + '.' + encodeBase64(signature) 
# token is now: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI
 

The resulting token is three Base64 strings separated by dots that can be easily passed in HTML and HTTP environments. 
In authentication, when the user successfully logs in using their credentials, a JSON Web Token will be returned and must be saved locally (typically in local storage), instead of the traditional approach of creating a session in the server and returning a cookie. When sending data from an application to a backend server it is a good idea to use JSON web token (JWT) to make sure the data has not been altered. 
The token is compact, making it quick to send to the backend.

*/


// 1. Encoding a header JSON Object and then base64 encode it.
// The first step in creating a JWT is to set the first part of the token, which is the header, then encode it and base64 it, using the above two PHP methods:
//setting the header: 'alg' => 'HS256' indicates that this token is signed using HMAC-SHA256
$header = [
                  'typ' => 'JWT',
                  'alg' => 'HS256'
        ];

// Returns the JSON representation of the header
$header = json_encode($header);	

//encodes the $header with base64.	
$header = base64_encode($header);

//list the resulted header
// print_r($header);



//2.Base64 encode a payload JSON Object.
$payload = ["country" => "Romania", "name" => "Octavia-Anghel", "email" => "octaviaanghel@gmail.com"]; 
 
//To encode the payload we use again the two methods described above: json_encode and base64_encode, like this: 

$payload = json_encode($header);		
$payload = base64_encode($header); 

//3. Concatenate the header and payload strings with "." Separator.
//After encoding the payload, we need to concatenate the header with the payload like this:
    $header.$payload;
//Next listing outputs the header and the payload, as you can see from the figure below.

unset($payload);

//setting the payload
$payload = [      
		"country" => "Romania",
		"name" => "Octavia-Anghel",
		"email" => "octaviaanghel@gmail.com"
		  ];

// Returns the JSON representation of the payload
$payload = json_encode($header);		

//encodes the $payload with base64.	
$payload = base64_encode($header);

//echo "$header.$payload";


//4. Compute the signature of the header and payload.
//Next step in creating a JWT in PHP is to set the signature by generate it using HMAC method.

//$signature = hash_hmac('sha256','$header.$payload', $key, true); 

// You will notice that the $key arguments is used at generating the signature. 
// It represents your personal password and is used to validate the signature, as you will see next in this article. In this case the $key is 'Octavia-Andrea-Anghel'.


//setting the personal key identification
$key = 'Octavia-Andrea-Anghel';

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

//echo $signature;

//5. Base64 encode the signature.
//Before performing the last step in creating the final token, we need to base64 encode also the signature, using this line of code:
$signature = base64_encode($signature); 


//6. The final step in creating our token is to concatenate all the strings: the header, the payload and the signature using this line:
$token = "$header.$payload.$signature";

//Next listing puts together all the above steps described above and outputs the resulted token:


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
?> 