<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Upload file</title>

</head>
<body>
<h3>Загрузка TXT файла</h3>

<!--ФОРМА-->
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="this_file" value="Выбрать файл">
    <div style="margin-top: 10px;">
        <button type="submit" class="btn btn-default">Загрузить</button>
    </div>
</form>

<?php
/*Подключаем обработчик загрузки файла
* Не использую action в форме, что бы остаться на той же странице
*/
if ($_FILES && $_FILES["this_file"]["error"] == UPLOAD_ERR_OK) {
    require_once('upload.php');
}
?>


</body>
</html>