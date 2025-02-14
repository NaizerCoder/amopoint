<?php

if (!empty($_POST)) {

    require_once('../class/connector.php');

    $ip = $_POST['ip'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $device = $_POST['device'];

    $db = new ConnectPDO();

    $db->query("INSERT INTO info (`ip`,`country`,`city`, `device`, `date`) VALUES (:ip, :country, :city, :device, NOW())",
        [
            'ip' => $ip,
            'country' => $country,
            'city' => $city,
            'device' => $device
        ]
    );

}




