<div class="contenedor crear">
    <h1>Fit<span>Camp</span></h1>

    <div class="contenedor-sm">
        <p>¡Hola! Vamos a crear tu cuenta en FitCamp</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
            </div>

            <div class="campo">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo $usuario->apellido; ?>">
            </div>

            <div class="campo">
                <label for="fechan">Fecha Nacimiento</label>
                <input type="date" id="fechan" name="fechan" value="<?php echo $usuario->fechan; ?>">
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario->email; ?>">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="campo">
                <label for="password2">Confirma Tu Password</label>
                <input type="password" id="password2" name="password2">
            </div>

            <div class="acciones">
                <input type="submit" class="boton" value="Registrar">
                <a href="/">¿Ya tienes cuenta? Inicia Sesión</a>
            </div>
        </form>
    </div>
</div>