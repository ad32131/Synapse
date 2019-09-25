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
<form id="frm1" name="frm1" method="post" action="./notice_write_action.php">
    <p class="page_title"><?php echo $config_s->notice_write ?></p>
    <input type="text" name="title" size="95%" minlength="1" maxlangth="100" placeholder="<?php echo $config_s->enter_title ?>" autofocus>
    <br>
    <textarea name="content"></textarea>
	</form>
    <div align="right">
        <input type="button" class="btn btn-danger" value="<?php echo $config_s->back_text ?>" onclick="history.back()" />
        <input type="button" class="btn btn-success" value="<?php echo $config_s->write ?>" onclick="document.getElementById('frm1').submit()" />
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

        CKEDITOR.replace('content', {
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
    <?php echo $config_s->footer1 ?><br/>
	<?php echo $config_s->footer2 ?><a class="footer" href="mailto:synapsesociety2018@gmail.com">synapsesociety2018@gmail.com</a>
</footer>
</body>
</html>