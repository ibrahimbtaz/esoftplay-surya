<?php if (!defined('_VALID_BBC')) exit('No direct script access allowed');

	$list_id = $config['list_id']; //395406e297
	$api_key = $config['api']; //b5b6232b91e091f4a033848691f8a3d1-us21
	$data_center = substr($api_key, strpos($api_key, '-') + 1);
	// $email = $_POST['email'];
	pr($api_key);
	$url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members';

	$json = json_encode([
		'email_address' => $_POST['email'],
		'status'        => 'subscribed', //pass 'subscribed' or 'pending'
	]);

	try {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if (200 == $status_code) {
			echo "The user added successfully to the Mailchimp.";
		}
	} catch (Exception $e) {
		echo $e->getMessage();
	}
# code...
