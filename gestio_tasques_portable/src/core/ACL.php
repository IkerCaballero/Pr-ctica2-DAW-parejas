<?php

class ACL {

	private static $permisos = [
    	'admin' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar',
        	'tareas.eliminar',
		'usuarios.crear'
    	],
    	'user' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar'
    	],
	'observador' => [
	    'tareas.index',
	    'tareas.ver'
	]
];

	public static function puede($accion) {

    	if (!isset($_SESSION['rol'])) {
        	return false;
    	}

    	$rol = $_SESSION['rol'];

	if (!isset(self::$permisos[$rol])) {

            return false;

        }

    	return in_array($accion, self::$permisos[$rol]);
	}
}
