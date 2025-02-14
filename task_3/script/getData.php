<?php

$date = (isset($_GET['date'])) ? $_GET['date'] : date('Y-m-d');

require_once('../class/connector.php');

$db = new ConnectPDO();

$linearGraph = $db->query("SELECT 
                DATE_FORMAT(info.date, '%H') AS hour,
                COUNT(DISTINCT info.ip) AS unique_visitors
                FROM info
                WHERE DATE_FORMAT(info.date, '%Y-%m-%d') = :date   
                GROUP BY 
                DATE_FORMAT(info.date, '%H')
                ORDER BY hour ASC",
    [
        'date' => $date,
    ])
    ->fetchAll();

$pieGraph = $db->query("SELECT 
                info.city,
                COUNT(DISTINCT info.ip) AS unique_visitors,
                ROUND(COUNT(DISTINCT info.ip) * 100.0 / SUM(COUNT(DISTINCT info.ip)) OVER ()) AS percentage
                FROM info
                WHERE DATE_FORMAT(info.date, '%Y-%m-%d') = :date  
                GROUP BY info.city",
    [
        'date' => $date,
    ])
    ->fetchAll();

/*ОТДАЕМ РЕЗУЛЬТАТЫ*/
$data = [
    'linear_graph' => $linearGraph,
    'pie_graph' => $pieGraph,
];

echo json_encode($data);

//    echo "<pre>";
//    print_r($linearGraph);
//    echo "</pre>";

