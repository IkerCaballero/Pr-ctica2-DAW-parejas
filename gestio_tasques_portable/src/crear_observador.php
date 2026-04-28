<?php
require_once "models/db.php";

$db = conectar();
$db->query("INSERT INTO usuarios (usuario, password, rol)
            VALUES ('observador', '".password_hash("observador123", PASSWORD_DEFAULT)."', 'observador')");
