<?php

require_once "db.php";

class Tarea {

public $id;
public $texto;
public $estado;
public $autor;
public $tema;
public $fecha_limite;


public function __construct($datos = []) {
$this->id = $datos['id'] ?? null;
$this->texto = $datos['texto'] ?? '';
$this->estado = $datos['estado'] ?? 'pendiente';
$this->autor = $datos['autor'] ?? null;
$this->tema = $datos['tema'] ?? '';
$this->fecha_limite = $datos['fecha_limite'] ?? null;
}
}
