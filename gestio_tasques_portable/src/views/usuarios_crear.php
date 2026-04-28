
<h2>Crear usuario</h2>

<form method="post" action="index.php?controller=Usuarios&action=crear">
    Usuario:
    <input type="text" name="usuario" required><br><br>

    Contraseña:
    <input type="password" name="password" required><br><br>

    Rol:
    <select name="rol">
        <option value="user">User</option>
        <option value="observador">Observador</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <button type="submit">Crear usuario</button>

</form>
