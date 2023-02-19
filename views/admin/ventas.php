<div class="contenedor admin">
    <h1>Lista de Ventas</h1>
</div>

<div class="contenedor">
    <h2>Buscar Ventas</h2>
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        </div>
    </form>
</div>

<main class="contenedor">

    <section class="inicio__section">

        <h1>Entregado</h1>

        <?php
        if (!isset($sales['Entregado'])) {
            echo "<h2>No Hay Ventas En Esta Fecha</h2>";
        }
        ?>

        <ul class="lista__productos ">
            <?php
            $idUser = 0;
            $totalVentaDia = 0;
            if (isset($sales['Entregado'])) {
                foreach ($sales['Entregado'] as $key => $sale) {
                    if ($idUser !== $sale->idUser) {
                        $total = 0;
            ?>
                        <div class="lista__productos--pedido lista__productos--pedido-entregado">
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
                            $proximo = $sales['Entregado'][$key + 1]->idUser ?? 0;

                            if (esUltimo($actual, $proximo)) {
                                $totalVentaDia += $total;
                            ?>
                                <br>
                                <p class="lista__productos--pedido-total">Total: <span>$ <?php echo $total; ?></span></p>
                        </div>
            <?php
                            } //Foreach  
                        }
                    }
            ?>
        </ul>

        <br>

        <h2>Total Vendido En Esta Fecha: $<?php echo $totalVentaDia; ?></h2>
    </section>
</main>