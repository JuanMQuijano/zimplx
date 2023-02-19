<div class="contenedor admin">
    <h1>Lista de Pedidos</h1>
</div>

<main class="contenedor">

    <section class="inicio__section">
        <h1>En Espera</h1>

        <?php
        if (!isset($sales['Espera'])) {
            echo "<h2>No Hay Pedidos En Esta Fecha</h2>";
        }
        ?>

        <ul class="lista__productos">
            <?php
            $idUser = 0;
            if (isset($sales['Espera'])) {
                foreach ($sales['Espera'] as $key => $sale) {
                    if ($idUser !== $sale->idUser) {
                        $total = 0;
            ?>
                        <div class="lista__productos--pedido">
                            <li>
                                <p>Cliente: <span><?php echo $sale->cliente; ?></span></p>
                                <p>Teléfono: <span><?php echo $sale->phone; ?></span></p>
                                <p>Dirección: <span><?php echo $sale->address; ?></span></p>
                                <p>Fecha: <span><?php echo $sale->date; ?></span></p>
                                <br>
                                <h3>Productos</h3>
                            <?php
                            $idUser = $sale->idUser;
                        } //If 
                        $total += $sale->price;
                            ?>
                            </li>
                            <p><span><?php echo $sale->productos . " -  $" . $sale->price; ?></span></p>
                            <?php

                            //Detectamos cual es el ultimo elemento con el mismo id, para despues de este elemento mostrar el total a pagar
                            $actual = $sale->idUser;
                            $proximo = $sales['Espera'][$key + 1]->idUser ?? 0;

                            if (esUltimo($actual, $proximo)) { ?>
                                <br>
                                <p class="lista__productos--pedido-total">Total: <span>$ <?php echo $total; ?></span></p>

                                <form action="/admin/entregar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $sale->idUser; ?>">
                                    <input type="submit" value="Entregado" class="boton-entregado">
                                </form>
                        </div>
            <?php }
                        }
                    } //Foreach 
            ?>
        </ul>

    </section>
</main>