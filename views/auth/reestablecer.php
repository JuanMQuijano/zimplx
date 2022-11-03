<div class="contenedor">
    <h1>Fit<span>Camp</span></h1>

    <div class="contenedor-sm">
        <p>¡Hola! Puedes ingresar tu nuevo password</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <?php if ($valido) { ?>
            <form class="formulario" method="POST">
                <div class="campo">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="acciones">
                    <input type="submit" class="boton" value="Actualizar Password">
                </div>
            </form>
        <?php } ?>
    </div>
</div>