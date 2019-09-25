<!DOCTYPE html>
<html>
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
<form id="frm1" name="frm1" method="post" action="./hospital_write_action.php">
    <p class="page_title"><?php echo $config_s->hospital_infomation_write ?></p>
    <?php echo $config_s->hospital_in1 ?>:<input type="text" name="HospitalName" size="95%" minlength="1" maxlangth="200" placeholder="<?php echo $config_s->hospital_in1 ?>" autofocus>
    <br>
	<?php
	for($i=1;$i<=11;$i++){
	echo "$config_s->hospital_in2$i:<input type=\"text\" name=\"MedicalSubject$i\" size=\"95%\" minlength=\"1\" maxlangth=\"200\" placeholder=\"$config_s->hospital_in2$i\">";
	echo "<br>";
	}
	?>
	<?php echo $config_s->hospital_in3 ?>:<input type="text" name="HospitalType" size="95%" minlength="1" maxlangth="200" placeholder="<?php echo $config_s->hospital_in3 ?>">
	<br>
	<?php echo $config_s->hospital_in4 ?>:<input type="text" name="HospitalTel" size="95%" minlength="1" maxlangth="200" placeholder="<?php echo $config_s->hospital_in4 ?>">
	<br>
	<?php echo $config_s->hospital_in5 ?>:<input type="text" name="HospitalAddress" size="95%" minlength="1" maxlangth="200" placeholder="<?php echo $config_s->hospital_in5 ?>">
	
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