<h1>Detalle de la tarea - icaballero@institutmvm.cat</h1>

<p><strong>Texto:</strong> <?= htmlspecialchars($tarea->texto) ?></p>
<p><strong>Estado:</strong> <?= $tarea->estado ?></p>
<p><strong>Autor:</strong> <?= $tarea->autor ?? 'Personal' ?></p>
<p><strong>Tema:</strong> <?= $tarea->tema ?></p>
<p><strong>Fecha límite:</strong> <?= $tarea->fecha_limite ?></p>

<a href="index.php">Volver al listado</a>
