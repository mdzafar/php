<?php
/*Get Access Tokens*/
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://account.demandware.com/dw/oauth2/access_token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=client_credentials",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic YWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhOmFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYWFhYQ==",
    "Content-Type: application/x-www-form-urlencoded"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $res = json_decode($response);
  /*Get Product Details*/
  $authorization = "Authorization: Bearer ". $res->access_token;
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://lyons5-evaluation-dw.demandware.net/s/-/dw/data/v19_1/products/microsoft-xbox360-bundleM?expand=all&site_id=RefArch",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    $authorization,
    "Content-Type: application/json"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
}
?>
