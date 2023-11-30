<?php  if ( ! defined('_VALID_BBC')) exit('No direct script access allowed');

// Menampilkan Subcription
$output = array();

$email = $_POST['email'] ?? '';
$list_id = $config['list_id'];
$api_key = $config['api'];

$data_center = substr($api_key,strpos($api_key,'-')+1);

$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';

$json = json_encode([
  'email_address' => $email,
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
} catch(Exception $e) {
    echo $e->getMessage();
}

// $header = array(
//   'CURLOPT_USERPWD' => 'user:' . $api_key, 
//   'CURLOPT_HTTPHEADER' => array(
//     // 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
//     // 'Accept-Language: en-US,en;q=0.5',
//     // 'Accept-Encoding: gzip, deflate',
//     // 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
//     // 'Keep-Alive: 300',
//     // 'Connection: keep-alive',
//     'Content-Type: application/json',
//     'CURLOPT_RETURNTRANSFER' => false,
//     'CURLOPT_TIMEOUT' => 10,
//     'CURLOPT_POST' => 1,
//     'CURLOPT_SSL_VERIFYPEER' => false,
//     'CURLOPT_POSTFIELDS' => $json
//   ),
// );

// $header['CURLOPT_HTTPHEADER'] = urlencode_r($header['CURLOPT_HTTPHEADER']);
// $output = $sys->curl($url, $json, $header);

include tpl(@$config['template'].'.html.php', 'default.html.php');
