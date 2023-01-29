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
                    foreach ($products['cervezas'] as $product) { ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <h2>$<?php echo $product->price; ?></h2>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="inicio__product-btn">
                                    Agregar al Carrito
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
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
                            <h2>$<?php echo $product->price; ?></h2>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="inicio__product-btn">
                                    Agregar al Carrito
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
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

    <section id="ron" class="inicio__section">

        <h1>Ron</h1>

        <div class="slider swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php if (isset($products['ron'])) {
                    foreach ($products['ron'] as $product) { ?>
                        <div class="inicio__product swiper-slide">
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <h2>$<?php echo $product->price; ?></h2>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="inicio__product-btn">
                                    Agregar al Carrito
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
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
                            <img src="/imagenes/<?php echo $product->image; ?>.webp" alt="Imagen Producto">
                            <h1> <?php echo $product->name; ?></h1>
                            <br>
                            <p> <?php echo $product->description; ?></p>
                            <br>
                            <h2>$<?php echo $product->price; ?></h2>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="inicio__product-btn">
                                    Agregar al Carrito
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
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