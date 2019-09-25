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


$title = $_POST['title'];
$content = $_POST['content'];
$MedicalSubject1 = $_POST['MedicalSubject1'];
$MedicalSubject2 = $_POST['MedicalSubject2'];
$MedicalSubject3 = $_POST['MedicalSubject3'];
$title = preg_replace("/[\'\"]/i", "", $title);
$content = preg_replace("/[\'\"]/i", "", $content);
$MedicalSubject1 = preg_replace("/[\'\"]/i", "", $MedicalSubject1);
$MedicalSubject2 = preg_replace("/[\'\"]/i", "", $MedicalSubject2);
$MedicalSubject3 = preg_replace("/[\'\"]/i", "", $MedicalSubject3);


$sql = "SELECT MAX(Idx) AS NUM FROM DiseaseInfo";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$total_record = mysqli_num_rows($result);
mysqli_data_seek($result,1);

$NUM = $row[NUM] +1;
$sql = "INSERT INTO DiseaseInfo VALUES ($NUM,\"$title\",\"$content\",\"$MedicalSubject1\",\"$MedicalSubject2\",\"$MedicalSubject3\");";
$result = mysqli_query($connect, $sql);
print "<script>location.href='./disease_list.php';</script>";
?>
