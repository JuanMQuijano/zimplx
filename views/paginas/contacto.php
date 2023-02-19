<div class="contenedor login">
    <h1>Zimplx</h1>
    <div class="contenedor-sm">
        <p>¡Hola! Agradecemos tu mensaje, luchamos por mejorar día a día, te responderemos en la mayor brevedad posible. 💖</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST">
            <div class="campo">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="<?php echo $message->name; ?>" placeholder="Ingresa Tu Nombre">
            </div>

            <div class="campo">
                <label for="lastname">Apellido</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $message->lastname; ?>" placeholder="Ingresa Tu Apellido">
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $message->email; ?>" placeholder="Ingresa Tu Email">
            </div>

            <div class="campo">
                <label for="message">Mensaje</label>
                <textarea name="message" id="message" value="<?php echo $message->message; ?>" placeholder="Ingresa Tu Mensaje"></textarea>
            </div>

            <div class="acciones">
                <input type="submit" class="boton" value="Enviar Mensaje">
            </div>
        </form>
    </div>
</div>