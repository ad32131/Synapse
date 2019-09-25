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


$Idx = $_GET['Idx'];
$Idx = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $Idx);


$sql = "DELETE FROM DiseaseInfo WHERE Idx='$Idx'";

$result = mysqli_query($connect, $sql);

print "<script>location.href='./disease_list.php';</script>";
?>
