<?php
$access_token = 'ddEV77o8kdwAMupkgssFq+szs6dwZH8qV7LmT41hFxkqXc83J+lJF/ZJVMxG502jUwLTn/JhObdBJNSLb2IOwNeT9K5syYYN/gmdqXPE1IbYpt5mAfjFieZ57deh+vqNc0Vu5OqrldfxRcNIiK5TZQdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)"
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
