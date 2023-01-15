<?php include_once __DIR__ . '/../templates/header_admin.php'; ?>

<main class="contenedor grid">
    <?php foreach ($products as $product) { ?>
        <div class="grid__product">
            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
            <h3> <?php echo $product->name; ?></h3>

            <form method="POST" action="/admin/eliminar">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                <input type="submit" value="Eliminar" class="boton">
            </form>
        </div>
    <?php } ?>
</main>