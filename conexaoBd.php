<?php 

class Conection{

    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "10205618";
    private static $db_name = "tributario";

    public static function getConnection() {
        $conn = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name;
         
        try {
            $connection = new PDO($conn, self::$db_user, self::$db_pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;

        } catch (PDOException $e) {
            die("Falha na conexão com o banco de dados: " . $e->getMessage());
        }
    }
        
}





?>