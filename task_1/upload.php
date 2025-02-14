<?php

/*ЗАГРУЗА ФАЙЛА*/
$file = $_FILES['this_file'];
$dirUpload = 'uploads/';
$newFileName = uniqid().".".strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if ($file['type'] === 'text/plain') {//если подан текстовый файл

    if($file['error'] === 0){ //если нет ошибок, работаем

        if (move_uploaded_file($file['tmp_name'], $dirUpload.$newFileName)) {
            echo "<div class='green_circle'></div>";
        } else {
            echo "<div class='red_circle'></div>";
        }
    }
    else $_REQUEST['error'] = 'ошибка загрузки';
}
else echo "<div class='red_circle'></div>";

/*ЧТЕНИЕ+ВЫВОД ФАЙЛА*/
$filename = $dirUpload.$newFileName;
if (file_exists($filename)) {
    $content = file_get_contents($filename);

    $fileArray = explode('.', $content); //формируем массив по разделителю "."

    /*Вывод массива построчно, с указанием количества цифр в каждой строке, используя регулярное выражение*/
    foreach ($fileArray as $value) {
        preg_match_all("/\d/",$value,$matches);
        $countNumber = count($matches[0]);

        if(mb_strlen(trim($value)) > 0) echo "<div>{$value} = {$countNumber}</div>"; //исключаем пустой элемент массива
    }

}

