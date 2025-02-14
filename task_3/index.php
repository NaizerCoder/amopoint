<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>


<div class="auth_main">
    <h2>Вход в систему</h2>
    <form method="post">
        <input type="text" name="username" class="autorization" required placeholder="логин" />
        <p>
            <input type="password" name="password" class="autorization" required placeholder="пароль">
        <p>
            <button type="submit" class="add">войти</button>
    </form>
</div>

<?php
session_start();

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once('class/connector.php');
    $db = new ConnectPDO();

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Поиск пользователя в базе данных
    $user = $db->query("SELECT * FROM users WHERE username = :username", ['username' => $username])->fetch();

    // Проверка пароля
    if ($user && password_verify($password, $user['password'])) {
        // Сохраняем данные пользователя в сессии
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: visit.php');
        exit;
    } else {
        echo "<p style='color: red; text-align: center;'>данные введены не верно</p>";
    }
}
?>
</body>
</html>
