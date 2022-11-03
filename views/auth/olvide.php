<div class="contenedor">
    <h1>Fit<span>Camp</span></h1>

    <div class="contenedor-sm">
        <p>¡Hola! ¿Olvidaste tu password?</p>
        <p>Ingresa tu correo para restaurar tu password</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="acciones">
                <input type="submit" class="boton" value="Enviar Instrucciones">
                <a href="/">¿Ya tienes cuenta? Inicia Sesión</a>
            </div>
        </form>
    </div>
</div>