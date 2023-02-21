<div class="campo">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" placeholder="Nombre Producto" value="<?php echo $product->name; ?>">
</div>

<div class="campo">
    <label for="description">Descripción</label>
    <input type="text" name="description" id="description" placeholder="Descripción Producto" value="<?php echo $product->description; ?>">
</div>

<div class="campo">
    <label for="type">Tipo de Producto</label>
    <select name="type" id="type">
        <option se value="cerveza" <?php echo $product->type === "cerveza" ? 'selected' : ''; ?>>Cerveza</option>
        <option value="aguardiente" <?php echo $product->type === "aguardiente" ? 'selected' : ''; ?>>Aguardiente</option>
        <option value="ron" <?php echo $product->type === "ron" ? 'selected' : ''; ?>>Ron</option>
        <option value="smirnoff" <?php echo $product->type === "smirnoff" ? 'selected' : ''; ?>>Smirnoff</option>
    </select>
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