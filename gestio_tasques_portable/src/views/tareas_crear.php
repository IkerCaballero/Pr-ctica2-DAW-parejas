
<?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<h1>Crear tarea - icaballero@institutmvm.cat</h1>

<form action="index.php?controller=Tareas&action=crear" method="POST">

	<input type="text" name="texto" placeholder="Descripción">

	<select name="estado">
    	<option value="pendiente">Pendiente</option>
    	<option value="iniciada">Iniciada</option>
    	<option value="finalizada">Finalizada</option>
	</select>

	<input type="text" name="autor" placeholder="Autor (opcional)">
	<input type="text" name="tema" placeholder="Tema">

	<input type="date" name="fecha_limite">

	<button>Guardar</button>
</form>

