<?php include_once __DIR__ . '/templates/hero.php'; ?>

<main class="contenedor inicio">
    <h1>¡Ordena ahora!</h1>

    <?php if (isset($_SESSION['nombre'])) { ?>
        <h2>¡Hola <?php echo $_SESSION['nombre']; ?>!👋🏻</h2>
    <?php } ?>

    <hr>
    <div class="contenedor-sm">
        <?php include_once __DIR__ . '/templates/alertas.php'; ?>
    </div>

    <section id="cervezas" class="inicio__section">

        <h1>Cervezas</h1>
        <p>Nacionales e Importadas</p>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['cervezas'])) {
                    foreach ($products['cervezas'] as $product) {
                ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <?php if ($product->quantity === "0") { ?>
                                <hr>
                                <h1>Producto Agotado</h1>
                                <hr>
                            <?php } else { ?>
                                <h2>$<?php echo number_format($product->price); ?></h2>

                                <button type="submit" class="inicio__product-btn" id="btnAgregar" value="<?php echo $product->id; ?>">
                                    Agregar al Carrito
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

    <section id="aguardiente" class="inicio__section">

        <h1>Aguardiente</h1>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['aguardiente'])) {
                    foreach ($products['aguardiente'] as $product) { ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <?php if ($product->quantity === "0") { ?>
                                <hr>
                                <h1>Producto Agotado</h1>
                                <hr>
                            <?php } else { ?>
                                <h2>$<?php echo number_format($product->price); ?></h2>

                                <button type="submit" class="inicio__product-btn" id="btnAgregar" value="<?php echo $product->id; ?>">
                                    Agregar al Carrito
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

    <section id="ron" class="inicio__section">

        <h1>Ron</h1>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['ron'])) {
                    foreach ($products['ron'] as $product) {
                ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <?php if ($product->quantity === "0") { ?>
                                <hr>
                                <h1>Producto Agotado</h1>
                                <hr>
                            <?php } else { ?>
                                <h2>$<?php echo number_format($product->price); ?></h2>

                                <button type="submit" class="inicio__product-btn" id="btnAgregar" value="<?php echo $product->id; ?>">
                                    Agregar al Carrito
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                            <?php } ?>
                        </div>
                <?php }
                } ?>
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
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <?php if ($product->quantity === "0") { ?>
                                <hr>
                                <h1>Producto Agotado</h1>
                                <hr>
                            <?php } else { ?>
                                <h2>$<?php echo number_format($product->price); ?></h2>

                                <button type="submit" class="inicio__product-btn" id="btnAgregar" value="<?php echo $product->id; ?>">
                                    Agregar al Carrito
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

    <input type="hidden" value="<?php echo session_id(); ?>" id="idUser">
</main>