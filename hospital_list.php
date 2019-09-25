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
$connect=mysqli_connect( $config_s->Server_name, $config_s->Db_account, $config_s->Password,$config_s->Db_select) or  die( "SQL server 접속실패");


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
    <p class="page_title"><?php echo $config_s->hospital_info ?></p>
	<p>
		<select class="arrows" onchange="document.location.href=this.value">
			<option value="http://wooriappworld.com/hospital_list.php" selected ><?php print $config_s->Medicalcare_Hospital ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=1" ><?php print $config_s->Medical1 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=2" ><?php print $config_s->Medical2 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=3" ><?php print $config_s->Medical3 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=4" ><?php print $config_s->Medical4 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=5" ><?php print $config_s->Medical5 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=6" ><?php print $config_s->Medical6 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=7" ><?php print $config_s->Medical7 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=8" ><?php print $config_s->Medical8 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=9" ><?php print $config_s->Medical9 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=10" ><?php print $config_s->Medical10 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=11" ><?php print $config_s->Medical11 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=12" ><?php print $config_s->Medical12 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=13" ><?php print $config_s->Medical13 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=14" ><?php print $config_s->Medical14 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=14" ><?php print $config_s->Medical14 ?></option>
			<option value="http://wooriappworld.com/hospital_list.php?type=15" ><?php print $config_s->Medical15 ?></option>
  		</select>
	</p>
<?php
	session_start();
	if($_SESSION['admin']==1){
	print "<div align=\"center\">";
    print "<input type=\"button\" class=\"btn_write btn-primary\" value=\"";
	print $config_s->write_text;
	print "\" onclick=\"location.href = 'hospital_write.php'\" />";
	print "</div>";
	}
?>
    <table id="hospital" class="display">
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
		if($_GET[type]==1) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical1."%\";";
		else if($_GET[type]==2) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical2."%\";";
		else if($_GET[type]==3) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical3."%\";";
		else if($_GET[type]==4) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical4."%\";";
		else if($_GET[type]==5) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical5."%\";";
		else if($_GET[type]==6) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical6."%\";";
		else if($_GET[type]==7) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical7."%\";";
		else if($_GET[type]==8) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical8."%\";";
		else if($_GET[type]==9) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical9."%\";";
		else if($_GET[type]==10) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical10."%\";";
		else if($_GET[type]==11) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical11."%\";";
		else if($_GET[type]==12) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical12."%\";";
		else if($_GET[type]==13) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical13."%\";";
		else if($_GET[type]==14) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical14."%\";";
		else if($_GET[type]==15) $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData  where CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) LIKE \"%".$config_s->Medical15."%\";";
		else $sql = "SELECT Idx,HospitalName,CONCAT_WS(' ',MedicalSubject1,MedicalSubject2,MedicalSubject3,MedicalSubject4,MedicalSubject5,MedicalSubject6,MedicalSubject7,MedicalSubject8,MedicalSubject9,MedicalSubject10,MedicalSubject11) AS HospitalClass,HospitalType,HospitalTel,HospitalAddress FROM HospitalData;";


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
			print "<p id='title' onclick='content_onoff($row[Idx])'>$row[HospitalName]</p>";
    		print "<div id='content' class='content$row[Idx]'>".$config_s->Medicalcare.": $row[HospitalClass]<br>";
    		print $config_s->Medicalcall.": <a href=\"tel:$row[HospitalTel]\">$row[HospitalTel]</a><br>";
    		print "<a href=\"https://www.google.com/maps/search/$row[HospitalAddress]\">".$config_s->Medicallink."</a><br><br>";
			session_start();
			if($_SESSION['admin']==1){
			print "<input type=\"button\" class=\"btn btn-success\" value=\"";
			print $config_s->update_text;
			print "\" onclick=\"location.href = 'hospital_edit.php?Idx=$row[Idx]'\" />";
			print "<input type=\"button\" class=\"btn btn-danger\" value=\"";
			print $config_s->delete_text;
			print "\" onclick=\"location.href = 'hospital_delete_action.php?Idx=$row[Idx]'\" />";
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
            $('#hospital').DataTable({
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