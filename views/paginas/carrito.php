<div class="contenedor carrito">

    <h1>Tu Carrito</h1>

    <?php
    if ($mostrar) { ?>
        <table class="tabla-carrito">
            <thead class="tabla-carrito__thead">
                <tr class="tabla-carrito__tr">
                    <th class="tabla-carrito__th tabla-carrito__td--ocultar">Producto</th>
                    <th class="tabla-carrito__th">Imagen Producto</th>
                    <th class="tabla-carrito__th tabla-carrito__td--ocultar">Precio Unitario</th>
                    <th class="tabla-carrito__th"></th>
                </tr>
            </thead>
            <tbody class="tabla-carrito__tbody" id="tbody">
                <?php
                $total = 0;
                foreach ($products_cart as $product_cart) {
                    $total += $product_cart->price;
                ?>
                    <tr class="tabla-carrito__tr" id="tr">

                    </tr>
                <?php } ?>
            </tbody>
        </table>
                
        <input type="hidden" id="id" value="<?php echo $id; ?>">
        <input type="hidden" id="total" value="<?php echo $total; ?>">
        <input type="hidden" id="precio_final" value="<?php echo $total ?>">

        <div class="acciones-carrito">
            <p id="total-parrafo"><span>Total a Pagar: </span>$<?php echo number_format($total); ?></p>

            <button class="acciones-carrito--comprar" id="btnCompra">Pagar
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
            </button>
        </div>
    <?php
    } else { ?>
        <div style="margin-top: 5rem;">
            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        </div>
    <?php } ?>
</div>