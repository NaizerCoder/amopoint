<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/getinfo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Посещения</title>

</head>
<body>
<!--SELECT-->
<?php
session_start();

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php'); // Перенаправляем на страницу входа
    exit;
}
// Если авторизовались, то работаем
require_once('class/connector.php');
$db = new ConnectPDO();

$dateUnique = $db->query("SELECT 
                                DISTINCT DATE_FORMAT(info.date, '%Y-%m-%d') as unique_date
                            FROM info")
    ->fetchAll(PDO::FETCH_COLUMN);

?>
<div>
    <select class="custom-select" id="sel_date">
        <?php
        foreach ($dateUnique as $item) {
            $selected = ($item == date("Y-m-d") ? "selected" : "");

            echo "<option $selected value=\"{$item}\">{$item}</option> \n";
        }
        ?>
    </select>
</div>

<!--ГРАФИК + ДИАГРАММА-->
<div style="width: 50%; float:left;">
    <canvas id="lineChart"></canvas>
</div>
<div style="width: 20%; float:left;">
    <canvas id="pieChart"></canvas>
</div>

<script src="js/chart.js"></script>

<a href="logout.php" class="add">выйти</a>

</body>
</html>