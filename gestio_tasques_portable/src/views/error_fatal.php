<h1>Error grave</h1>

<p>
<?php
if (!empty($_SESSION['error_fatal'])) {
    echo $_SESSION['error_fatal'];
    unset($_SESSION['error_fatal']);
} else {
    echo "Ha ocurrido un error inesperado";
}
?>
</p>

<a href="index.php">Volver al inicio</a>
