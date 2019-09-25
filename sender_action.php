<?php

session_start();
if($_SESSION['admin']==1){
class Settings { 

private static $instance; 

private $settings; 

private function __construct( $config_s) { 

$this->settings = parse_ini_file( $config_s, true); 

} 

public static function getInstance( $config_s) { 

if(! isset(self::$instance)) { 

self::$instance = new Settings( $config_s); 

} 

return self::$instance;

} 

public function __get($setting) { 

if(array_key_exists($setting, $this->settings)) { 

return $this->settings[$setting]; 

} else { 

foreach($this->settings as $section) { 

if(array_key_exists($setting, $section)) { 

return $section[$setting]; 

} 

} 

} 

} 

}

$config_s = Settings::getInstance('DB_CON.php');
$connect=mysqli_connect( $config_s->Server_name, $config_s->Db_account, $config_s->Password,$config_s->Db_select) or  die( "SQL serverｿ｡ ｿｬｰ睇ﾒ ｼ・ｾﾀｴﾏｴﾙ.");

$title = $_POST['title'];
$content = $_POST['content'];
$title = preg_replace("/[\'\"]/i", "", $title);
$content = preg_replace("/[\'\"]/i", "", $content);

$sql = "SELECT * FROM pushapikey";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$total_record = mysqli_num_rows($result);
for($i=0;$i<$total_record;$i++){
mysqli_data_seek($result,$i);
$row = mysqli_fetch_array($result);



$json = '{
"notification":
{
    "title": "test",
    "body": "test"
},
"to": "tata"}';
$tmp = json_decode($json);
$tmp->to=$row['apikey'];
$tmp->notification->title=$title;
$tmp->notification->body=$content;
$json = json_encode($tmp);

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
curl_close($ch);
}
print "<script>self.opener = null;self.close();</script>";
}

?>
