<?php

class connection{
    public function connect(){
        $host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'localhost';
        $dbname = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'dentalheat';
        $username = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root';
        $password = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : '';

        try {
            $dsn="mysql:host={$host};dbname={$dbname}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return new PDO($dsn, $username, $password, $options);
        } catch (\Throwable $th){
            echo "Error en la conexion " . $th->getMessage();
            exit;
        }
    }
}

?>