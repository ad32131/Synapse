<?php

$json = '{
"notification":
{
    "title": "tttt",
    "body": "tttt"
},
"to": "dEwM6-ESCNg:APA91bFLATI9ttzsuXwticOj_y6u-SUYBkBsWlhnqLR-MN3ZNCB7D8os-We7eY2566IqDANNeG-K8JS8_Cs0PtqZWRW_UCZ2PgYqieOvLXNE7wfRSv8sPPbfHkBX2mWGU5LfD9u-ILX1"}';

print $json;
$ch = curl_init();

$headers = array(
    'Content-Type: application/json',
    'Authorization: key=AAAA1x9wwH0:APA91bH8H4Zp8gmFBYU3DcwXunRI_kKKWYXeeCn8dA8pfsz0in1tzJZG9cMQUylUODowxDq4J37lCvH2ayzt3uMlVJmx-WJDaDRc-uW1AeBrDP2C_XozIJQJPXbFildAOtavWKYTKspA'
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
print $response;
?>