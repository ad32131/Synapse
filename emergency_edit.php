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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WOORIAPP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/woori.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="head_title" align="center" onclick="location.href = 'index.html'">
        <p class="title">WOORIAPP</p>
</div>
<div class="body">
<form id="frm1" name="frm1" method="post" action="./emergency_edit_action.php">
    <p class="page_title"><?php echo $config_s->emergency_infomation_update ?></p>
	
<?php
$No = $_GET['No'];
$No = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $No);


$sql = "SELECT * FROM EmergencyContact WHERE No='$No'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$total_record = mysqli_num_rows($result);
mysqli_data_seek($result,1);
echo "<input type=\"hidden\" value=\"$row[No]\" name=\"No\">";
echo "<input type=\"text\" value=\"$row[Content]\" name=\"title\" size=\"95%\" minlength=\"1\" maxlangth=\"100\" placeholder=\"";
echo $config_s->emergency_write_text_1;
echo "\" autofocus>";
echo "<br>";
echo "<input type=\"text\" value=\"$row[Tel]\" name=\"content\" size=\"95%\" minlength=\"1\" maxlangth=\"100\" placeholder=\"";
echo $config_s->emergency_write_text_2;
echo "\">";	
?>
    
	</form>
    <div align="right">
        <input type="button" class="btn btn-danger" value="<?php echo $config_s->back_text ?>" onclick="history.back()" />
        <input type="button" class="btn btn-success" value="<?php echo $config_s->write ?>" onclick="document.getElementById('frm1').submit()" />
    </div>
    </div>
</div>
    
<footer>
    <?php echo $config_s->footer1 ?><br/>
	<?php echo $config_s->footer2 ?><a class="footer" href="mailto:synapsesociety2018@gmail.com">synapsesociety2018@gmail.com</a>
</footer>
</body>
</html>