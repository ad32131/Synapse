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
<form id="frm1" name="frm1" method="post" action="./sender_action.php">
    <p>전체 메세지 보내기</p>
    <input type="text" name="title" size="95%" minlength="1" maxlangth="100" placeholder="제목을 입력해주세요" autofocus>
    <br>
    <textarea name="content"></textarea>
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
    <h4>Synapse Society</h4>
</footer>
</body>
</html>