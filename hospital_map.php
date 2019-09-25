<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WOORIAPP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/woori.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="head_title" align="center" onclick="location.href = 'index.html'">
        <p class="title">WOORIAPP</p>
</div>
<div class="head_btn" align="center">
    <input type="button" class="btn btn-primary" value="공지사항" onclick="location.href = 'notice.php'" />
    <input type="button" class="btn btn-primary" value="질병 정보" onclick="location.href = 'disease_list.php'" />
    <input type="button" class="btn btn-primary" value="병원 정보" onclick="location.href = 'hospital_list.php'" />
    <input type="button" class="btn btn-primary" value="긴급연락처" onclick="location.href = 'emergency_contact.php'" />
</div>
<div class="body" align="center">
    <p class="page_title">병원 위치</p>
    body
</div>
<footer>
    <?php echo $config_s->footer1 ?><br/>
	<?php echo $config_s->footer2 ?><a class="footer" href="mailto:synapsesociety2018@gmail.com">synapsesociety2018@gmail.com</a>
</footer>
</body>
</html>