<?php 
class Database {
    private static $pdo;
    public static function getConnect() {
        try {
            self::$pdo = new PDO(
                "pgsql:host=localhost;port=5432;dbname=Etec",
                "postgres",
                "123",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
                );
               
        }catch (PDOException $e) {
            echo "Database Connection failed: " . $e->getMessage();
        }
        return self::$pdo;
    }
}

Database::getConnect();