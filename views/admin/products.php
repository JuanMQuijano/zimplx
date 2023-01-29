<div class="contenedor admin">
    <h1>Lista de Productos</h1>
</div>

<main class="contenedor">

    <section class="inicio__section">
        <h1>Cervezas</h1>
        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($products['cervezas'] as $product) { ?>
                    <div class="inicio__product swiper-slide">
                        <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto" class="grid__product--img">
                        <h1> <?php echo $product->name; ?></h1>
                        <br>
                        <p> <?php echo $product->description; ?></p>
                        <br>
                        <h2>$<?php echo $product->price; ?></h2>
                        <a href="/admin/actualizar?id=<?php echo $product->id; ?>">Actualizar</a>
                        <form method="POST" action="/admin/eliminar" class="formulario">
                            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                            <input type="submit" value="Eliminar" class="inicio__product--btnBorrar">
                        </form>
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="inicio__section">
        <h1>Aguardiente</h1>
        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($products['aguardiente'] as $product) { ?>
                    <div class="inicio__product swiper-slide">
                        <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto" class="grid__product--img">
                        <h1> <?php echo $product->name; ?></h1>
                        <br>
                        <p> <?php echo $product->description; ?></p>
                        <br>
                        <h2>$<?php echo $product->price; ?></h2>
                        <a href="/admin/actualizar?id=<?php echo $product->id; ?>">Actualizar</a>
                        <form method="POST" action="/admin/eliminar" class="formulario">
                            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                            <input type="submit" value="Eliminar" class="inicio__product--btnBorrar">
                        </form>
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="inicio__section">

        <h1>Ron</h1>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['ron'])) {
                    foreach ($products['ron'] as $product) { ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto" class="grid__product--img">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <h2>$<?php echo $product->price; ?></h2>
                            <a href="/admin/actualizar?id=<?php echo $product->id; ?>">Actualizar</a>
                            <form method="POST" action="/admin/eliminar" class="formulario">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <input type="submit" value="Eliminar" class="inicio__product--btnBorrar">
                            </form>
                        </div>
                    <?php }
                } else { ?>
                    <h3 class="inicio__product-mensaje">Producto Agotado</h3>
                <?php } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

    <section id="smirnoff" class="inicio__section">

        <h1>Smirnoff</h1>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['smirnoff'])) {
                    foreach ($products['smirnoff'] as $product) { ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto" class="grid__product--img">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <h2>$<?php echo $product->price; ?></h2>
                            <a href="/admin/actualizar?id=<?php echo $product->id; ?>">Actualizar</a>
                            <form method="POST" action="/admin/eliminar" class="formulario">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <input type="submit" value="Eliminar" class="inicio__product--btnBorrar">
                            </form>
                        </div>
                    <?php }
                } else { ?>
                    <h3 class="inicio__product-mensaje">Producto Agotado</h3>
                <?php } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>
</main>