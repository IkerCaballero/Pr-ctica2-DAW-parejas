<?php

require_once "models/UsuariosModel.php";
require_once "core/ACL.php";

class UsuariosController {
    public function crear() {
        if (!ACL::puede('usuarios.crear')) {

            $_SESSION['error'] = "No tienes permisos para crear usuarios";
            header("Location: index.php");
            exit;

        }

        if (!empty($_POST['usuario'])) {
            $modelo = new UsuariosModel();
            $modelo->crear(
                $_POST['usuario'],
                $_POST['password'],
                $_POST['rol']
            );

            $_SESSION['mensaje'] = "Usuario creado correctamente";
            header("Location: index.php");
            exit;
        }
        require "views/usuarios_crear.php";
    }
}
