<div class="contenedor login">
    <h1>Zimple</h1>
    <div class="contenedor-sm">
        <p>¡Hola! Vamos a crear tu cuenta en Zimple</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="login__formulario" method="POST">
            <div class="campo">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="<?php echo s($usuario->name); ?>" placeholder="Ingresa Tu Nombre">
            </div>

            <div class="campo">
                <label for="lastname">Apellido</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo s($usuario->lastname); ?>" placeholder="Ingresa Tu Apellido">
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo s($usuario->email); ?>" placeholder="Ingresa Tu Email">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Ingresa Tu Contraseña">
            </div>

            <div class="campo">
                <label for="password2">Confirma Tu Password</label>
                <input type="password" id="password2" name="password2" placeholder="Confirma Tu Contraseña">
            </div>

            <div class="acciones">
                <input type="submit" class="boton" value="Registrar">
                <a href="/login">¿Ya tienes cuenta? Inicia Sesión</a>
            </div>
        </form>
    </div>
</div>