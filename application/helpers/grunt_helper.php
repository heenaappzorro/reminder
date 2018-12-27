<?php
defined('BASEPATH') || exit('No direct script access allowed');

function android_noti($registrationID,$message_data,$noti_type)
{
  	$apiKey = "AAAArtO54F4:APA91bHd54oqJubibDE7FoRVygTGoRxYtONduO4FqLVEN7DQ1xRlTdSHjKbo73MUXxgEn-t4nkoJolUMJPMfoap5nuTg9oo_rPwvWLKrCjKbqhvBRHb7_aIJQnyOMQtHffZWxghPeINr";
    $fields = array(
						'registration_ids'  => array($registrationID),
						'data'              => array("message" => $message_data,
						                             "noti_type" => $noti_type
						                            )
				   );
	//echo"<pre>";print_r($fields);"</pre>";
	$url = 'https://fcm.googleapis.com/fcm/send';
	$headers = array( 
						'Authorization: key=' . $apiKey,
						'Content-Type: application/json'
					);
    $ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$res = curl_exec($ch);
    //echo"<pre>";print_r($res);"</pre>";
    
	
   
	if($res===FALSE)
	{
		die('Curl failed: ' . curl_erroe($ch));
	}
	curl_close($ch);	
}

function ios_noti($recivertok_id,$message,$type)
{  
		error_reporting(0);
		$deviceToken = $recivertok_id;
		//echo $deviceToken;

        // Put your private key's passphrase here:
        $passphrase = '';

        // Put your alert message here:
		$message = $message;
      
		$ctx = stream_context_create();
		$dir        = APPPATH . 'gruntSchool.pem';
		//stream_context_set_option($ctx, 'ssl', 'local_cert', 'cabmaps.pem');
		stream_context_set_option($ctx, 'ssl', 'local_cert', $dir); //9 march 2015
		//stream_context_set_option($ctx, 'ssl', 'local_cert', 'APNS_Sub_Lite.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			//'ssl://gateway.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);

			// echo 'Connected to APNS' . PHP_EOL;

			// Create the payload body
			$body['aps'] = array(
    
			'alert' => $message,
			'sound' => 'default',
			'message' => 'product', 
			'type' => $type, 
		);

		// Encode the payload as JSON
		$payload = json_encode($body);
		//echo"<pre>";print_r($payload);"</pre>";

		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		 //echo"<pre>";print_r($msg);"</pre>";

		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
        //echo"<pre>";print_r($result);"</pre>";
        //~ if (!$result)
				 //~ echo 'Message not delivered' . PHP_EOL;
			 //~ else
				 //~ echo 'Message successfully delivered' . PHP_EOL;



		// Close the connection to the server
		 
		fclose($fp);

}
