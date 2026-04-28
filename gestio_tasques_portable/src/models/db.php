<?php

function conectar() {
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASS');

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}
