
<h1>Lista de tareas - icaballero@institutmvm.cat</h1>

<ul>

<?php if (!empty($_SESSION['mensaje'])): ?>
	<p class="ok"><?= $_SESSION['mensaje'] ?></p>
	<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= $_SESSION['error'] ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (ACL::puede('usuarios.crear')): ?>
    <a href="index.php?controller=Usuarios&action=crear">
        Crear usuario
    </a>
<?php endif; ?>

<?php foreach ($tareas as $t): ?>
	<li>
    	<?= htmlspecialchars($t->texto) ?>  
    	(<?= $t->estado ?> – <?= $t->tema ?>)

	<a href="index.php?controller=Tareas&action=ver&id=<?= $t->id ?>"
	    Ver
	</a>

	<a href="index.php?controller=Tareas&action=editar_form&id=<?= $t->id ?>"
            Editar
        </a>

	<a href="index.php?controller=Auth&action=logout"
            Cerrar sesión
        </a>

	<a href="index.php?controller=Tareas&action=eliminar&id=<?= $t->id ?>"
	   onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
   	    Eliminar
	</a>

	</li>
<?php endforeach; ?>
</ul>

<a href="index.php?controller=Tareas&action=crear">
	Crear nueva tarea
</a>

