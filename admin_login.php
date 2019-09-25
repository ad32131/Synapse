<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WOORIAPP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/woori.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
<div class="head_title" align="center" onclick="location.href = 'index.html'">
        <h2>WOORIAPP ADMIN LOGIN</h2>
		
</div>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td height="623" align="center" valign="middle"><table width="712" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td><img src="./images/top.gif" width="712" height="18"></td>
      </tr>
      <tr>
        <td><table width="712" border="0" cellpadding="0" cellspacing="0" bordercolor="#EFF3F2">
            <tbody><tr>
              <td width="20" background="./images/left_bg.gif"> </td>
              <td width="224"><img src="./images/login_img.gif" width="224" height="185"></td>
              <td width="16" bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF"><table width="432" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td><img src="./images/login_img02.gif" width="432" height="97"></td>
                  </tr>
                  <tr>
                    <td height="1" background="./images/dot_line.gif"> </td>
                  </tr>
                  <tr>
                    <td height="14"> </td>
                  </tr>
                  <tr>
                    <td valign="middle"><table width="432" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                          <td width="215"><table width="200" border="0" cellspacing="0" cellpadding="0">
						  <form name="frm1" method="post" action="./admin_login_action.php" onsubmit="return logincheck()">
				          <input type="hidden" name="act" value="ok">
						  <input type="hidden" name="url" value="">
                              <tbody><tr>
                                <td width="62"><img src="./images/id.gif" width="62" height="13"></td>
                                <td><input name="uid" type="text" class="input" style="width:130px" size="10"></td>
                              </tr>
                              <tr>
                                <td><img src="./images/pw.gif" width="62" height="13"></td>
                                <td><input name="upass" type="password" class="input" style="width:130px" size="10"></td>
                              </tr>
							 
                          </tbody></table></td>
                          <td width="217"><input type="image" src="./images/bt_login.gif" onclick="document.getElementById('frm1').submit()" width="103" height="45" border="0"></td>
						   </form>
                        </tr>
                    </tbody></table></td>
                  </tr>
                  <tr>
                    <td height="14"> </td>
                  </tr>
                  <tr>
                    <td height="1" background="./images/dot_line.gif"> </td>
                  </tr>
                  <tr>
                    <td height="8"> </td>
                  </tr>
              </tbody></table></td>
              <td width="20" background="./images/right_bg.gif"> </td>
            </tr>
        </tbody></table></td>
      </tr>
      <tr>
        <td><img src="./images/foot.gif" width="712" height="18"></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>

<footer>
    Synapse Society는 외국인노동자, 이주노동자들의 안전한 삶을 위해 노력하는 사회적기업을 지향하는 기업입니다.<br/>
	Web/App 개발 문의 : <a class="footer" href="mailto:synapsesociety2018@gmail.com">synapsesociety2018@gmail.com</a>
</footer>
</body>
</html>