<?php
require_once "models/db.php";

$db = conectar();

$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser = password_hash("user123", PASSWORD_DEFAULT);


$stmt = $db->prepare(
"INSERT INTO usuarios (usuario, password, rol)
VALUES ('admin', :password, 'admin')"
);
$stmt->execute([':password' => $passwordAdmin]);

$stmt = $db->prepare(
"INSERT INTO usuarios (usuario, password, rol)
VALUES ('user', :password, 'user')"
);
$stmt->execute([':password' => $passwordUser]);

