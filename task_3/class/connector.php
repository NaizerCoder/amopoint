<?php

class ConnectPDO
{
    private $pdo;
    private $host = '';
    private $dbname = '';
    private $username = '';
    private $password = '';

    public function __construct()
    {
        // Подключение к базе данных
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Режим ошибок: выбрасывать исключения
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Режим выборки данных: ассоциативный массив
                ]
            );

        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

    }

    // Метод для выполнения SQL-запросов
    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Возникла ошибка: " . $e->getMessage());
        }
    }

}
