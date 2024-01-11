<?php include "components/header.php" ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre: </label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>

    <label for="password">Contraseña: </label>
    <input type="password" id="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>

<?php include "components/footer.php" ?>