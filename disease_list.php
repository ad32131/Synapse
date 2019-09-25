<!DOCTYPE html>
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WOORIAPP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/woori.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
</head>
<body>
<div class="head_title" align="center">
        <p onclick="location.href = 'index.html'"><img class="title" src="images/wooriapp/logo-header.png"></p>
		<input type="button" class="head_btn" value="<?php echo $config_s->notice_title ?>" onclick="location.href = 'notice.php'" />
		<input type="button" class="head_btn" value="<?php echo $config_s->disease_info ?>" onclick="location.href = 'disease_list.php'" />
		<input type="button" class="head_btn" value="<?php echo $config_s->hospital_info ?>" onclick="location.href = 'hospital_list.php'" />
		<input type="button" class="head_btn" value="<?php echo $config_s->emergency ?>" onclick="location.href = 'emergency_contact.php'" />
</div>
<div class="body" align="center">
    <p class="page_title"><?php echo $config_s->disease_info ?></p>
<?php
	session_start();
	if($_SESSION['admin']==1){
	print "<div align=\"center\">";
    print "<input type=\"button\" class=\"btn_write btn-primary\" value=\"글쓰기\" onclick=\"location.href = 'disease_write.php'\" />";
	print "</div>";
	}
?>
    <table id="disease" class="display">
		<colgroup>
			<col class width="15%" align="center">
			<col class width="85%">
		</colgroup>
        <thead>
        <tr align="center">
            <th>No</th>
            <th>Subject</th>
        </tr>
		</thead>
        <tbody>
		<?php
		$sql = "SELECT * FROM DiseaseInfo;";

		$result = mysqli_query($connect, $sql);


		$row = mysqli_fetch_array($result);
		$total_record = mysqli_num_rows($result);

		for($i=0;$i<$total_record;$i++){
			print "<tr>";
			mysqli_data_seek($result,$i);
			$row = mysqli_fetch_array($result);
			print "<td align=\"center\">";
			print $row[Idx];
			print "</td>";
			print "<td>";
			print "<p id=\"title\" onclick=\"content_onoff($row[Idx])\">$row[DiseaseTitle]</p>";
    		print "<div id=\"content\" class=\"content$row[Idx]\">$row[DiseaseContents]<br><br>";

			print $config_s->Medicalmenu1;
			if($row['MedicalSubject1']==$config_s->Medical1) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=1\">";
			else if($row['MedicalSubject1']==$config_s->Medical2) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=2\">";
			else if($row['MedicalSubject1']==$config_s->Medical3) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=3\">";
			else if($row['MedicalSubject1']==$config_s->Medical4) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=4\">";
			else if($row['MedicalSubject1']==$config_s->Medical5) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=5\">";
			else if($row['MedicalSubject1']==$config_s->Medical6) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=6\">";
			else if($row['MedicalSubject1']==$config_s->Medical7) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=7\">";
			else if($row['MedicalSubject1']==$config_s->Medical8) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=8\">";
			else if($row['MedicalSubject1']==$config_s->Medical9) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=9\">";
			else if($row['MedicalSubject1']==$config_s->Medical10) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=10\">";
			else if($row['MedicalSubject1']==$config_s->Medical11) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=11\">";
			else if($row['MedicalSubject1']==$config_s->Medical12) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=12\">";
			else if($row['MedicalSubject1']==$config_s->Medical13) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=13\">";
			else if($row['MedicalSubject1']==$config_s->Medical14) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=14\">";
			else if($row['MedicalSubject1']==$config_s->Medical15) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=15\">";
			print "$row[MedicalSubject1]</a></br>";
			print $config_s->Medicalmenu2;
			if($row['MedicalSubject2']==$config_s->Medical1) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=1\">";
			else if($row['MedicalSubject2']==$config_s->Medical2) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=2\">";
			else if($row['MedicalSubject2']==$config_s->Medical3) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=3\">";
			else if($row['MedicalSubject2']==$config_s->Medical4) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=4\">";
			else if($row['MedicalSubject2']==$config_s->Medical5) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=5\">";
			else if($row['MedicalSubject2']==$config_s->Medical6) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=6\">";
			else if($row['MedicalSubject2']==$config_s->Medical7) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=7\">";
			else if($row['MedicalSubject2']==$config_s->Medical8) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=8\">";
			else if($row['MedicalSubject2']==$config_s->Medical9) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=9\">";
			else if($row['MedicalSubject2']==$config_s->Medical10) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=10\">";
			else if($row['MedicalSubject2']==$config_s->Medical11) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=11\">";
			else if($row['MedicalSubject2']==$config_s->Medical12) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=12\">";
			else if($row['MedicalSubject2']==$config_s->Medical13) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=13\">";
			else if($row['MedicalSubject2']==$config_s->Medical14) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=14\">";
			else if($row['MedicalSubject2']==$config_s->Medical15) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=15\">";
			print "$row[MedicalSubject2]</a></br>";
			print $config_s->Medicalmenu3;
			if($row['MedicalSubject3']==$config_s->Medical1) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=1\">";
			else if($row['MedicalSubject3']==$config_s->Medical2) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=2\">";
			else if($row['MedicalSubject3']==$config_s->Medical3) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=3\">";
			else if($row['MedicalSubject3']==$config_s->Medical4) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=4\">";
			else if($row['MedicalSubject3']==$config_s->Medical5) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=5\">";
			else if($row['MedicalSubject3']==$config_s->Medical6) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=6\">";
			else if($row['MedicalSubject3']==$config_s->Medical7) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=7\">";
			else if($row['MedicalSubject3']==$config_s->Medical8) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=8\">";
			else if($row['MedicalSubject3']==$config_s->Medical9) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=9\">";
			else if($row['MedicalSubject3']==$config_s->Medical10) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=10\">";
			else if($row['MedicalSubject3']==$config_s->Medical11) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=11\">";
			else if($row['MedicalSubject3']==$config_s->Medical12) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=12\">";
			else if($row['MedicalSubject3']==$config_s->Medical13) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=13\">";
			else if($row['MedicalSubject3']==$config_s->Medical14) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=14\">";
			else if($row['MedicalSubject3']==$config_s->Medical15) echo "<a href=\"http://wooriappworld.com/hospital_list.php?type=15\">";
			print "$row[MedicalSubject3]</a></br>";
			session_start();
			if($_SESSION['admin']==1){
			print "<input type=\"button\" class=\"btn btn-success\" value=\"";
			print $config_s->update_text;
			print "\" onclick=\"location.href = 'disease_edit.php?Idx=$row[Idx]'\" />";
			print "<input type=\"button\" class=\"btn btn-danger\" value=\"";
			print $config_s->delete_text;
			print "\" onclick=\"location.href = 'disease_delete_action.php?Idx=$row[Idx]'\" />";
			}	
    		print "</div>";
			print "</td>";
			print "</tr>";
			}

		?>
        </tbody>
    </table>
    <script>
        var pri_content_num = 0;
		
		$(document).ready( function () {
            $('#disease').DataTable({
                "filter": false,
                "bLengthChange": false,
                "bInfo": false
                })
        });

        $(content).hide();
		
        function content_onoff(content_num){
            if($('.content'+content_num).css("display")=="none") {
                $('.content'+content_num).show();
				$('.content'+pri_content_num).hide();
				pri_content_num = content_num;
            }

            else if($('.content'+content_num).css("display")=="block") {
        	    $('.content'+content_num).hide();
            }
        };
    </script>
</div>

<footer>
	<table align="center">
		<tbody class="footer">
			<tr>
				<td><img src="/images/wooriapp/img-footer@3x.png">&nbsp;&nbsp;&nbsp;</td>
				<td align="left"><?php echo $config_s->footer1 ?></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo $config_s->footer2 ?><a class="footer" href="mailto:synapsesociety2018@gmail.com">synapsesociety2018@gmail.com</a></td>
			</tr>
		</tbody>
	</table>
</footer>
</body>
</html>