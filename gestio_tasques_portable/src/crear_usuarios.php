<?php
require_once "models/db.php";

$conn = conectar();

$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser = password_hash("user123", PASSWORD_DEFAULT);


$stmt = $conn->prepare(
"INSERT INTO usuarios (usuario, password, rol)
VALUES ('admin', :password, 'admin')"
);
$stmt->execute([':password' => $passwordAdmin]);

$stmt = $conn->prepare(
"INSERT INTO usuarios (usuario, password, rol)
VALUES ('user', :password, 'user')"
);
$stmt->execute([':password' => $passwordUser]);

