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


$HospitalName = $_POST['HospitalName'];
$MedicalSubject1 = $_POST['MedicalSubject1'];
$MedicalSubject2 = $_POST['MedicalSubject2'];
$MedicalSubject3 = $_POST['MedicalSubject3'];
$MedicalSubject4 = $_POST['MedicalSubject4'];
$MedicalSubject5 = $_POST['MedicalSubject5'];
$MedicalSubject6 = $_POST['MedicalSubject6'];
$MedicalSubject7 = $_POST['MedicalSubject7'];
$MedicalSubject8 = $_POST['MedicalSubject8'];
$MedicalSubject9 = $_POST['MedicalSubject9'];
$MedicalSubject10 = $_POST['MedicalSubject10'];
$MedicalSubject11 = $_POST['MedicalSubject11'];
$HospitalType = $_POST['HospitalType'];
$HospitalTel = $_POST['HospitalTel'];
$HospitalAddress = $_POST['HospitalAddress'];


$HospitalName = preg_replace("/[\'\"]/i", "", $HospitalName);
$MedicalSubject1 = preg_replace("/[\'\"]/i", "", $MedicalSubject1);
$MedicalSubject2 = preg_replace("/[\'\"]/i", "", $MedicalSubject2);
$MedicalSubject3 = preg_replace("/[\'\"]/i", "", $MedicalSubject3);
$MedicalSubject4 = preg_replace("/[\'\"]/i", "", $MedicalSubject4);
$MedicalSubject5 = preg_replace("/[\'\"]/i", "", $MedicalSubject5);
$MedicalSubject6 = preg_replace("/[\'\"]/i", "", $MedicalSubject6);
$MedicalSubject7 = preg_replace("/[\'\"]/i", "", $MedicalSubject7);
$MedicalSubject8 = preg_replace("/[\'\"]/i", "", $MedicalSubject8);
$MedicalSubject9 = preg_replace("/[\'\"]/i", "", $MedicalSubject9);
$MedicalSubject10 = preg_replace("/[\'\"]/i", "", $MedicalSubject11);
$MedicalSubject11 = preg_replace("/[\'\"]/i", "", $MedicalSubject11);
$HospitalType = preg_replace("/[\'\"]/i", "", $HospitalType);
$HospitalTel = preg_replace("/[\'\"]/i", "", $HospitalTel);
$HospitalAddress = preg_replace("/[\'\"]/i", "", $HospitalAddress);


$sql = "SELECT MAX(Idx) AS NUM FROM HospitalData";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$total_record = mysqli_num_rows($result);
mysqli_data_seek($result,1);

$NUM = $row[NUM] +1;
$sql = "INSERT INTO HospitalData VALUES ($NUM,\"$HospitalName\",\"$MedicalSubject1\",\"$MedicalSubject2\",\"$MedicalSubject3\",\"$MedicalSubject4\",\"$MedicalSubject5\",\"$MedicalSubject6\",\"$MedicalSubject7\",\"$MedicalSubject8\",\"$MedicalSubject9\",\"$MedicalSubject10\",\"$MedicalSubject11\",\"$HospitalType\",\"$HospitalTel\",\"$HospitalAddress\");";
$result = mysqli_query($connect, $sql);
print "<script>location.href='./hospital_list.php';</script>";
?>
