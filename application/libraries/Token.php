<?php namespace App\Libraries;

use Firebase\JWT\JWT;

class Token {
	private $secret_key;

	public static function create($data = [])
	{
		JWT::$leeway 	= 60;
		$secret_key 	= file_get_contents(ROOTPATH."public/key/private.pem");

		$issuer_claim 		= base_url();
		$audience_claim 	= "THE_AUDIENCE";
		$issuedat_claim 	= time(); // issued at
		$notbefore_claim 	= $issuedat_claim + 10; //not before in seconds
		$expire_claim 		= $issuedat_claim + (3600 * 24); // expire time in seconds
		$token = array(
			"iss" 	=> $issuer_claim,
			"aud" 	=> $audience_claim,
			"iat" 	=> $issuedat_claim,
			"nbf" 	=> $notbefore_claim,
			"exp" 	=> $expire_claim,
			"data" 	=> $data
		);

		$token = JWT::encode($token, $secret_key);
		
		return $token;
	}

	public static function verify($token, $request)
	{
		JWT::$leeway 	= 60;
		$secret_key 	= file_get_contents(ROOTPATH."public/key/private.pem");

		$return = null;
		try {
			$decoded = JWT::decode($token, $secret_key, array('HS256'));
			
			if ($decoded) {
				$request->setHeader('currentUser', $decoded->data);
				$return = true;
			}
		} catch (\Exception $e) {
			$return = false;
		}

		return $return;
	}

	public static function decode($token) {
		JWT::$leeway 	= 60;
		$secret_key 	= file_get_contents(ROOTPATH."public/key/private.pem");

		$return = null;
		try {
			$decode = JWT::decode($token, $secret_key, array('HS256'));
			$return = (array)$decode->data;
		} catch (\Exception $e) {
			$return = false;
		}

		return $return;
	}
}