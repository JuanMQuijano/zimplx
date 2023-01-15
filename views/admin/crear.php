<?php include_once __DIR__ . '/../templates/header_admin.php'; ?>

<main class="contenedor">

    <h1><?php echo $titulo ?></h1>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <div class="campo">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre Producto" value="<?php echo $product->name; ?>">
        </div>

        <div class="campo">
            <label for="description">Descripción</label>
            <input type="text" name="description" id="description" placeholder="Descripción Producto" value="<?php echo $product->description; ?>">
        </div>

        <div class="campo">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image" accept="image/jpg, image/png, image/jpeg">
        </div>

        <div class="campo">
            <label for="price">Precio</label>
            <input type="number" name="price" id="price" placeholder="Precio Producto" value="<?php echo $product->price; ?>">
        </div>

        <div class="campo">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" id="quantity" placeholder="Cantidad Producto" value="<?php echo $product->quantity; ?>">
        </div>

        <input type="submit" value="Agregar Producto" class="boton">
    </form>
</main>