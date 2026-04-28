<?php

require_once "models/Validacion.php";
require_once "core/ACL.php";
require_once "models/TareasModel.php";
require_once "models/tarea.php";

class TareasController {

    public function index() {
        $modelo = new TareasModel();
        $tareas = $modelo->getAll();
        require "views/tareas_listado.php";
    }


public function crear() {
	if (!ACL::puede('tareas.editar')) {
            $_SESSION['error'] = "No tienes permisos para crear tareas";
            header("Location: index.php");
            exit;
          }



	if (isset($_POST['texto'])){
            $datos = [
                'texto' => $_POST['texto'],
                'estado' => $_POST['estado'],
                'autor' => $_POST['autor'] ?: null,
                'tema' => $_POST['tema'],
                'fecha_limite' => $_POST['fecha_limite'] ?: null

            ];
            $errores = Validacion::validarTarea($datos);

            if (!empty($errores)) {
                $_SESSION['error'] = implode(', ', $errores);
                require "views/tareas_crear.php";
                return;
            }

	   try{
            $modelo = new TareasModel();
            $tarea = new Tarea($datos);
            $modelo->save($tarea);

	    $_SESSION['mensaje'] = "Tarea creada correctamente";
            header("Location: index.php");
            exit;

        } catch (PDOException $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
	    require "views/error_fatal.php";
	    exit;
    }
  }
        require "views/tareas_crear.php";
}

public function ver() {

	if (!isset($_GET['id'])) {
            $_SESSION['error_fatal'] = "Acceso incorrecto a la tarea";
            require "views/error_fatal.php";
            exit;
        }

            $modelo = new TareasModel();
            $tarea = $modelo->getById($_GET['id']);

    	if (!$tarea) {
            $_SESSION['error_fatal'] = "La tarea solicitada no existe";
            require "views/error_fatal.php";
            exit;
        }

            require "views/tareas_ver.php";
}


public function editar_form() {

	if (!ACL::puede('tareas.editar')) {
            $_SESSION['error'] = "No tienes permisos para editar tareas";

        header("Location: index.php");
        exit;
	}

        if (!isset($_GET['id'])) {
            header("Location: index.php");
            exit;

        }

        $modelo = new TareasModel();
        $tarea = $modelo->getById($_GET['id']);
        require "views/tareas_editar.php";

    }


    public function editar() {
	if (!isset($_GET['id'])) {
       	    $_SESSION['error_fatal'] = "Acceso incorrecto a la tarea";
            require "views/error_fatal.php";
            exit;
        }

    	$modelo = new TareasModel();
    	$tarea = $modelo->getById($_GET['id']);

    	if (!$tarea) {
            $_SESSION['error_fatal'] = "La tarea no existe";
             require "views/error_fatal.php";
             exit;
        }

	if (!empty($_POST['id'])) {
            $datos = [
                'id' => $_POST['id'],
                'texto' => $_POST['texto'],
                'estado' => $_POST['estado'],
                'autor' => $_POST['autor'] ?: null,
                'tema' => $_POST['tema'],
                'fecha_limite' => $_POST['fecha_limite'] ?: null
            ];

            $errores = Validacion::validarTarea($datos);

            if (!empty($errores)) {
                $_SESSION['error'] = implode(', ', $errores);
                $tarea = new Tarea($datos);
                require "views/tareas_editar.php";
                return;
            }

	    try {
            	$modelo = new TareasModel();
            	$tarea = new Tarea($datos);
            	$modelo->update($tarea);

		$_SESSION['mensaje'] = "Tarea editada correctamente";
	        header("Location: index.php?controller=Tareas&action=index");
        	exit;

    	} catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
            exit;
        }
    }

    require "views/tareas_editar.php";
}


    public function eliminar() {
	if (!ACL::puede('tareas.eliminar')) {
	    $_SESSION['error'] = "No tienes permisos para eliminar tareas";
	    header("Location: index.php");
	    exit;
        }

	if (!isset($_GET['id'])) {
            $_SESSION['error_fatal'] = "Acceso incorrecto a la tarea";
            require "views/error_fatal.php";
            exit;
        }

       	    $modelo = new TareasModel();
            $tarea = $modelo->getById($_GET['id']);

    	if (!$tarea) {
            $_SESSION['error_fatal'] = "La tarea no existe";
            require "views/error_fatal.php";
            exit;
        }

       try {
           $modelo->delete($_GET['id']);
           $_SESSION['mensaje'] = "Tarea eliminada correctamente";
           header("Location: index.php?controller=Tareas&action=index");
           exit;

      } catch (Exception $e) {
       	  $_SESSION['error_fatal'] = $e->getMessage();
          require "views/error_fatal.php";
          exit;
     }
  }
}
