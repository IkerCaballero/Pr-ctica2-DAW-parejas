<?php

require_once "models/db.php";

class UsuariosModel {
    public function crear($usuario, $password, $rol) {
        $db = conectar();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare(
            "INSERT INTO usuarios (usuario, password, rol)
             VALUES (?, ?, ?)"
        );

        $stmt->execute([$usuario, $password, $rol]);
    }
}
