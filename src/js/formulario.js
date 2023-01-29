(function () {
  const btnCompra = document.querySelector("#btnCompra");
  const Swal = require("sweetalert2");

  if (btnCompra) {
    const idUser = document.querySelector("#id").value;
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#email").value;

    const tbody = document.querySelector("#tbody");
    const precioFinal = document.querySelector("#total").value;

    let arrayProductos = [];

    obtenerCompras();

    async function obtenerCompras() {
      try {
        const url = `/api/carrito?id=${idUser}`;
        const respuesta = await fetch(url);
        const resultado = await respuesta.json();

        arrayProductos = resultado;

        mostrarProductos();
      } catch (error) {
        console.log(error);
      }
    }

    function mostrarProductos() {
      arrayProductos.forEach((producto) => {
        const { id, name, image, price } = producto;

        const tr = document.querySelector("#tr");

        const td_nombre = document.createElement("TD");
        td_nombre.textContent = name;
        td_nombre.classList.add(
          "tabla-carrito__td",
          "tabla-carrito__td--ocultar"
        );

        const td_imagen = document.createElement("TD");
        td_imagen.innerHTML = `
      <img src="/imagenes/${image}.webp" alt="Imagen Producto">
      `;
        td_imagen.classList.add("tabla-carrito__td");

        const td_precio = document.createElement("TD");
        td_precio.classList.add(
          "tabla-carrito__td",
          "tabla-carrito__td--ocultar"
        );
        td_precio.textContent = "$" + price;

        const td_eliminar = document.createElement("TD");
        td_eliminar.innerHTML = `
        <form action="/carrito/eliminar" method="POST">
            <input type="hidden" name="idProduct" value="${id}">
            <button class="tabla-carrito__td--eliminar" type="submit">
                <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </form>
      `;

        tr.appendChild(td_nombre);
        tr.appendChild(td_imagen);
        tr.appendChild(td_precio);
        tr.appendChild(td_eliminar);

        tbody.appendChild(tr);
      });
    }

    btnCompra.addEventListener("click", function () {
      mostrarModal(nombre, correo, id);
    });

    function mostrarModal(nombre, correo, id) {
      const modal = document.createElement("DIV");
      modal.classList.add("modal");

      modal.innerHTML = `
                <form class="modal__formulario" method="POST">
                    <legend>Finalizar Compra</legend>
        
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" disabled name="nombre" id="nombre" value=${nombre}>
                    </div>
        
                    <div class="campo">
                        <label for="correo">Correo</label>
                        <input type="email" disabled name="correo" id="correo" value=${correo}>
                    </div>
        
                    <div class="campo">
                        <label for="phone">Teléfono</label>
                        <input type="tel" name="phone" id="phone" required min="10" placeholder="Tú Número de Teléfono">
                    </div>

                    <div class="campo">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" required placeholder="Tú Dirección">
                    </div>

                                            
                    <input type="hidden" name="id" value=${id}>                    
        
                    <div class="acciones">                
                        <input type="submit" class="submit" value="Finalizar Compra"/>
                        <button type="button" class="cerrar-modal">Cancelar</button>
                    </div>
                </form>
            `;

      setTimeout(() => {
        const formulario = document.querySelector(".modal__formulario");
        formulario.classList.add("animar");
      }, 0);

      modal.addEventListener("click", function (e) {
        e.preventDefault();

        if (e.target.classList.contains("cerrar-modal")) {
          const formulario = document.querySelector(".modal__formulario");
          formulario.classList.add("cerrar");
          setTimeout(() => {
            modal.remove();
          }, 500);
        }

        if (e.target.classList.contains("submit")) {
          const address = document.querySelector("#address").value;
          const phone = document.querySelector("#phone").value;

          if (address === "" || phone === "") {
            alert("Desbes Completar el Formulario");
          } else {
            const phoneN = new String(phone);

            if (phoneN.length < 10) {
              alert("Desbes Ingresar un número válido");
              return;
            }

            arrayProductos.forEach((producto) => {
              agregarCompraApi(producto, address, phoneN);
            });

            setTimeout(() => {
              window.location.replace("/carrito/limpiar");
            }, 3000);
          }
        }
      });

      document.body.classList.add("modal-show");
      document.body.appendChild(modal);
    }

    async function agregarCompraApi(producto, address, phone) {
      const { id, price } = producto;

      let datos = new FormData();
      datos.append("idUser", idUser);
      datos.append("idProduct_Car", id);
      datos.append("address", address);
      datos.append("phone", phone);
      datos.append("price", price);
      datos.append("total_price", precioFinal);

      const url = "/api/carrito/crear";

      try {
        const respuesta = await fetch(url, {
          method: "POST",
          body: datos,
        });

        const resultado = await respuesta.json();

        if (resultado.resultado) {
          Swal.fire({
            title: "¡Compra Realizada!",
            text: "¡Nos comunicaremos contigo para confirmar tu orden!",
            icon: "success",
            confirmButtonText: "Ok",
          });
        }
      } catch (error) {
        console.error(error);
      }
    }
  }
})();
