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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="head_title" align="center" onclick="location.href = 'index.html'">
        <h2>WOORIAPP</h2>
</div>
<div class="body">
<form id="frm1" name="frm1" method="post" action="./hospital_edit_action.php">
    <p>병원 정보 게시글 수정</p>
<?php
$Idx = $_GET['Idx'];
$Idx = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $Idx);


$sql = "SELECT * FROM HospitalData WHERE Idx='$Idx'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$total_record = mysqli_num_rows($result);
mysqli_data_seek($result,1);
echo "<input type=\"hidden\" value=\"$row[Idx]\" name=\"Idx\">";
echo "병원명:<input type=\"text\" value=\"$row[HospitalName]\" name=\"HospitalName\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"병원명\" autofocus>";
echo "<br>";

echo "진료과목1:<input type=\"text\" value=\"$row[MedicalSubject1]\" name=\"MedicalSubject1\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목1\">";
echo "<br>";
echo "진료과목2:<input type=\"text\" value=\"$row[MedicalSubject2]\" name=\"MedicalSubject2\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목2\">";
echo "<br>";
echo "진료과목3:<input type=\"text\" value=\"$row[MedicalSubject3]\" name=\"MedicalSubject3\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목3\">";
echo "<br>";
echo "진료과목4:<input type=\"text\" value=\"$row[MedicalSubject4]\" name=\"MedicalSubject4\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목4\">";
echo "<br>";
echo "진료과목5:<input type=\"text\" value=\"$row[MedicalSubject5]\" name=\"MedicalSubject5\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목5\">";
echo "<br>";
echo "진료과목6:<input type=\"text\" value=\"$row[MedicalSubject6]\" name=\"MedicalSubject6\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목6\">";
echo "<br>";
echo "진료과목7:<input type=\"text\" value=\"$row[MedicalSubject7]\" name=\"MedicalSubject7\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목7\">";
echo "<br>";
echo "진료과목8:<input type=\"text\" value=\"$row[MedicalSubject8]\" name=\"MedicalSubject8\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목8\">";
echo "<br>";
echo "진료과목9:<input type=\"text\" value=\"$row[MedicalSubject9]\" name=\"MedicalSubject9\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목9\">";
echo "<br>";
echo "진료과목10:<input type=\"text\" value=\"$row[MedicalSubject10]\" name=\"MedicalSubject10\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목10\">";
echo "<br>";
echo "진료과목11:<input type=\"text\" value=\"$row[MedicalSubject11]\" name=\"MedicalSubject11\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"진료과목11\">";
echo "<br>";

echo "<br>";
echo "의료기관종별:<input type=\"text\" value=\"$row[HospitalType]\" name=\"HospitalType\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"의료기관종별\">";
echo "<br>";
echo "병원 연락처:<input type=\"text\" value=\"$row[HospitalTel]\" name=\"HospitalTel\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"병원 연락처\">";
echo "<br>";
echo "병원 주소:<input type=\"text\" value=\"$row[HospitalAddress]\" name=\"HospitalAddress\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"병원 주소\">";
		
?>
	</form>
    <div align="right">
        <input type="button" class="btn btn-danger" value="뒤로가기" onclick="history.back()" />
        <input type="button" class="btn btn-success" value="작성" onclick="document.getElementById('frm1').submit()" />
    </div>
    </div>
</div>
    <script type="text/javascript">
    function setEditor() {
        CKEDITOR.config.width = '100%';
        CKEDITOR.config.height = '70%';
        CKEDITOR.config.toolbar_User = [
            ['Source', 'Maximize', 'Preview'],
            ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Find', 'Replace'],
            '/',
            ['Undo', 'Redo'],
            ['Font', 'FontSize'],
            ['TextColor', 'BGColor', 'Link'],
            ['Image', 'Table', 'CreateDiv', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Templates', 'Smiley', '-', 'About']
        ];

        CKEDITOR.replace('DiseaseContents', {
            skin: 'moono-lisa',
            toolbar: 'User',
            enterMode: '2', //엔터키 태그 1:<p>, 2:<br>, 3:<div>
            shiftEnterMode: '1', //쉬프트+엔터키 태그 1:<p>, 2:<br>, 3:<div>
            toolbarCanCollapse : true,
            removeDialogTabs: 'link:target;link:advanced;image:Link;image:advanced',
            filebrowserImageUploadUrl: '/editor_upload.php?path=test',
            comma: ''
        });
    }

    $(function(){
        setEditor();
    });
    </script>
<footer>
    <h4>Synapse Society</h4>
</footer>
</body>
</html>