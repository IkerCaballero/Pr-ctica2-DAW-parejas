<?php
require_once "db.php";
require_once "tarea.php";

class TareasModel {

	public function getAll() {
    	$db = conectar();
    	$stmt = $db->query("SELECT * FROM tareas ORDER BY id DESC");
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$tareas = [];
    	foreach ($resultado as $fila) {
        	
        	$tareas[] = new Tarea($fila);
    	}
    	return $tareas;
    	}

	public function getById($id) {
    	$db = conectar();
    	$stmt = $db->prepare("SELECT * FROM tareas WHERE id = :id");
    	$stmt->execute([':id' => $id]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    	
	if (!$fila) {
    	    return null;
	}

	return new Tarea($fila);
}

	public function save(Tarea $tarea) {
    	try{
	$db = conectar();
    	$stmt = $db->prepare("
        	INSERT INTO tareas (texto, estado, autor, tema, fecha_limite)
        	VALUES (:texto, :estado, :autor, :tema, :fecha_limite)
    	");
    	$stmt->execute([
        	':texto'    	=> $tarea->texto,
        	':estado'   	=> $tarea->estado,
        	':autor'    	=> $tarea->autor,
        	':tema'     	=> $tarea->tema,
        	':fecha_limite' => $tarea->fecha_limite
    	]);
	} catch (PDOException $e) {
          throw new Exception("Error al guardar la tarea");
    }
}

	public function update(Tarea $tarea) {
        try{
	$db = conectar();
        $stmt = $db->prepare("
            UPDATE tareas SET
                texto = :texto,
                estado = :estado,
                autor = :autor,
                tema = :tema,
                fecha_limite = :fecha_limite
            WHERE id = :id
        ");

        $stmt->execute([
            ':texto'        => $tarea->texto,
            ':estado'       => $tarea->estado,
            ':autor'        => $tarea->autor,
            ':tema'         => $tarea->tema,
            ':fecha_limite' => $tarea->fecha_limite,
            ':id'           => $tarea->id

        ]);
	} catch (PDOException $e) {
        throw new Exception("Error al actualizar la tarea");
      }
   }

	public function delete($id) {
	try {
	    $db = conectar();
	    $stmt = $db->prepare("DELETE FROM tareas WHERE id = :id");
	    $stmt->execute([':id' => $id]);
	} catch (PDOException $e) {
        throw new Exception("Error al eliminar la tarea");
    }
  }
}
