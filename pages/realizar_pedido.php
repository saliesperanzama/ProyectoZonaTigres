<?php 
    include('includes/encabezado2.php');
    // include('includes/sql.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }
    $id = $_GET['id'];
    $consulta = "SELECT * FROM productos WHERE idproductos = $id";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    $nombre = $row['nombre'];
    $precio = $row['precio'];
?>
    <section class="flex flex-row items-center h-full w-full justify-around">
    <div class="mt-8 bg-negro p-8 rounded-lg shadow-lg bg-opacity-40" style="width: 30%; margin-top: 70px; margin-bottom: 65px;">
        <h2 class="font-semibold text-blanco mb-4 text-2xl text-center">Crear Pedido</h2>

        <form action="procesar_pedido.php" method="post">
            <div class="mb-4">
                <label for="producto" class="block text-blanco font-medium">Producto:</label>
                <input value="<?= $nombre ?>" type="text" id="producto" name="producto" class="w-full border rounded-md p-2" readonly>
            </div>

            <div class="mb-4">
                <label for="fecha_entrega" class="block text-blanco font-medium">Fecha de entrega:</label>
                <input type="date" id="fecha_entrega" name="fecha_entrega" max="<?= date('Y-m-d', strtotime('+3 days')) ?>" class="w-full border rounded-md p-2" required>
            </div>

            <!-- Telefono para contactarte -->
            <div class="mb-4">
                <label for="contacto" class="block text-blanco font-medium">Teléfono de contacto:</label>
                <input type="text" id="contacto" maxlength="10" name="contacto" class="w-full border rounded-md p-2" oninput="validarTelefono(this)" required>
            </div>

            <div class="mb-4">
                <label for="precio" class="block text-blanco font-medium">Precio por unidad:</label>
                <input value="<?= $precio ?>" type="number" id="precio" name="precio" min="0.01" step="0.01" class="w-full border rounded-md p-2" readonly>
            </div>

            <div class="mb-4">
                <label for="cantidad" class="block text-blanco font-medium">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" min="1" class="w-full border rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="total" class="block text-blanco font-medium">Total:</label>
                <input type="text" id="total" name="total" class="w-full border rounded-md p-2" readonly required>
            </div>
            <div class="text-center">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input value="Realizar Pedido" id="realizarpedido" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
                <button class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja"><a href="productos.php">Cancelar</a></button>
            </div>
            </form>
        </div>

        <script>
            // Calcular el total al cambiar el precio o la cantidad
            document.getElementById('precio').addEventListener('input', calcularTotal);
            document.getElementById('cantidad').addEventListener('input', calcularTotal);

            function calcularTotal() {
                const precio = parseFloat(document.getElementById('precio').value);
                const cantidad = parseInt(document.getElementById('cantidad').value);
                const total = isNaN(precio) || isNaN(cantidad) ? 0 : (precio * cantidad).toFixed(2);
                document.getElementById('total').value = total;
            }

            function validarTelefono(input) {
                // Limpiar el valor de entrada, dejando solo los dígitos
                input.value = input.value.replace(/\D/g, '');
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Obtener el elemento de entrada de fecha
                var fechaEntregaInput = document.getElementById('fecha_entrega');

                // Obtener la fecha de mañana
                var fechaManana = new Date();
                fechaManana.setDate(fechaManana.getDate() + 1);

                // Establecer el atributo min con la fecha de mañana
                fechaEntregaInput.min = fechaManana.toISOString().split('T')[0];

                function deshabilitarSabadosDomingos(date) {
                    var day = date.getDay();
                    // 6 es sábado, 0 es domingo
                    return !(day === 6 || day === 5);
                }


                // Función para manejar el evento de cambio de fecha
                function manejarCambioFecha() {
                var selectedDate = new Date(fechaEntregaInput.value);
                if (!deshabilitarSabadosDomingos(selectedDate)) {
                    alert('No se permiten entregas los sábados y domingos. Por favor, elige otra fecha.');
                    fechaEntregaInput.value = ''; // Limpiar el valor si es sábado o domingo
                    calcularTotal();
                }
                }

                // Agregar el evento de cambio de fecha al elemento de entrada de fecha
                fechaEntregaInput.addEventListener('change', manejarCambioFecha);
            });
        </script>
    </section>
<?php
    include('includes/pie.php');
?>