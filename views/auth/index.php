<div class="contenedor login">

    <h1>Zimple</h1>

    <div class="contenedor-sm">
        <p>¡Hola! Inicia Sesión en Zimple</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu Email" value="<?php echo s($auth->email); ?>">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Tu Contraseña">
            </div>

            <div class="acciones">
                <input type="submit" class="boton" value="Iniciar Sesión">
                <a href="/register">¿Aún no tienes cuenta? Crea Una</a>
            </div>
        </form>
    </div>
</div>