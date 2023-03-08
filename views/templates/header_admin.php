<header>
    <div class="header">
        <div class="header__formater">
            <a href="/">
                <h1>Zimplx</h1>
            </a>

            <div class="header__close" id="header__close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <nav class="header__nav-bar" id="header__nav-bar">
            <!-- Si es Admin -->
            <?php if (isset($_SESSION['admin'])) {
                echo $titulo === 'Pedidos' ? '' : '<a href="/admin">Pedidos</a>';
                echo $titulo === 'Productos' ? '' : '<a href="/admin/products">Productos</a>';
                echo $titulo === 'Agregar Producto' ? '' : '<a href="/admin/crear">Agregar Producto</a>';
                echo $titulo === 'Ventas' ? '' : '<a href="/admin/ventas">Revisar Ventas</a>'; ?>

                <a href="/logout" class="header__logout">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </a>
            <?php }
            //Si no ha iniciado sesión
            else { ?>
                <a href="/#cervezas">Cervezas</a>
                <a href="/#aguardiente">Aguardiente</a>
                <a href="/#ron">Ron</a>
                <a href="/#smirnoff">Smirnoff</a>
                <a href="/carrito" class="header__logout" style="display:flex; gap:2rem;">
                    ¡Carrito!
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            <?php } ?>
        </nav>
    </div>

</header>