<h1>Editar tarea</h1>

<form method="post" action="index.php?controller=Tareas&action=editar">
<input type="hidden" name="id" value="<?= $tarea->id ?>">

Texto:
<input type="text" name="texto" value="<?= htmlspecialchars($tarea->texto) ?>"><br>

Estado:
<input type="text" name="estado" value="<?= $tarea->estado ?>"><br>

Autor:
<input type="text" name="autor" value="<?= $tarea->autor ?>"><br>

Tema:
<input type="text" name="tema" value="<?= $tarea->tema ?>"><br>

Fecha límite:
<input type="date" name="fecha_limite" value="<?= $tarea->fecha_limite ?>"><br>

<button type="submit">Guardar</button>
</form>

<a href="index.php">Cancelar</a>
