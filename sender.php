<?php

$json = '{
"notification":
{
    "title": "テスト送信",
    "body": "This Is 送信テストです"
},
"to": "index.htmlで取得したトークンを記述"}';

$ch = curl_init();

$headers = array(
    'Content-Type: application/json',
    'Authorization: key=Firebaseの秘密キーを記述'
);

curl_setopt_array($ch, array(
    CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $json
));

$response = curl_exec($ch);

curl_close($ch);

?>