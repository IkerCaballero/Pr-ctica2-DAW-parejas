<?php

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

	if (!ACL::puede('tareas.crear')) {
            $_SESSION['error'] = "No tienes permisos para crear tareas";

        header("Location: index.php");
        exit;
	}

	if (!empty($_POST['texto'])) {
	    $tarea = new Tarea ($_POST);
    	    $modelo = new TareasModel();
    	    $modelo->save($tarea);

	
    	header("Location: index.php?controller=Tareas&action=index");
    	exit;
	}

	require "views/tareas_crear.php";
}

public function ver() {

	if (!isset($_GET['id'])) {
    	header("Location: index.php");
    	exit;
	}

	$modelo = new TareasModel();
	$tarea = $modelo->getById($_GET['id']);

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

	if (!ACL::puede('tareas.editar')) {
            $_SESSION['error'] = "No tienes permisos para editar tareas";

        header("Location: index.php");
        exit;
	}

        if (!empty($_POST['id'])) {
            $tarea = new Tarea($_POST);
            $modelo = new TareasModel();
            $modelo->update($tarea);

	    $_SESSION['mensaje'] = "Tarea creada";

        }

        header("Location: index.php");
        exit;

    }

    public function eliminar() {
	if (!ACL::puede('tareas.eliminar')) {
	    $_SESSION['error'] = "No tienes permisos para eliminar tareas";

	header("Location: index.php");
	exit;
    }

	if (isset($_GET['id'])) {
	    $modelo = new TareasModel();
	    $modelo->delete($_GET['id']);
	    $_SESSION['mensaje'] = "Tarea eliminada";
    }

	header("Location: index.php");
	exit;
    }

}
