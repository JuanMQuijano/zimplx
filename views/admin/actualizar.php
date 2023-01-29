<main class="contenedor crear">

    <h1><?php echo $titulo ?></h1>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data">

        <?php include_once __DIR__ . '/formulario.php';?>
        <input type="submit" value="Actualizar Producto" class="boton">
    </form>
</main>