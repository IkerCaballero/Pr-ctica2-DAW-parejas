<?php
session_start();

$controller = $_GET['controller'] ?? 'Tareas';
$action     = $_GET['action'] ?? 'index';

$publicActions = ['login', 'loginProcess'];

if (!isset($_SESSION['usuario']) && !in_array($action, $publicActions)) {
	header("Location: index.php?controller=Auth&action=login");
	exit;
}

$controllerName = $controller . "Controller";

require_once "controllers/" . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->$action();
