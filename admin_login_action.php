<meta charset="UTF-8">
<?php
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

$uid = $_POST['uid'];
$uid = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $uid);

$upass = $_POST['upass'];
$sql = "SELECT * FROM admin_user where admin_user='$uid' and admin_pass=password('$upass');";
$result = mysqli_query($connect, $sql);


$total_record = mysqli_num_rows($result);

if($total_record>0){
	session_start();
	$_SESSION['admin']=1;
	print "<script>location.href = './index.html';</script>";
}else{
	print "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');</script>";
	session_start();
	print "<script>location.href = './admin_login.php';</script>";
}
?>