<?php 
    include ('../includes/encabezadoadmin.php');
    include ('../includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
?>

<section class="flex items-center justify-center h-full w-full">
            <!-- <div class="flex flex-col mr-7" style=" width: 40%">
                    <h1 class="text-blanco font-bold text-center" style="font-size: 3rem; line-height: 1;">¡Estás a unos pasos!</h1>
                    <br>
                    <p class="text-blanco text-justify" style="font-size: 3rem; line-height: 1;">Ingresa los datos de tu producto/servicio, envíalos, y a continuación los datos de tu producto/servicio serán validados, si es aceptado, deberá aparecer dependiendo del tipo, en la ventana de Productos o Servicios.</p>
                    <p class="text-blanco text-justify" style="font-size: 2rem; line-height: 1;">Tiempo de validación: 1 a 3 días hábiles</p>
            </div> -->
            <br>
                <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/2 mt-4">
                  <h1 class="font-semibold text-blanco mb-4 text-center">Ingresa Los Datos del Producto o Servicio</h1>
                <form action="anadir_producto-manejo.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="foto" class="block text-blanco font-medium mb-2">Foto del producto/servicio:</label>
                        <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-md p-2 text-blanco" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-blanco font-medium mb-2">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-blanco font-medium mb-2">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-blanco font-medium mb-2">Precio:</label>
                        <input type="number" id="precio" name="precio" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipo" class="block text-blanco font-medium mb-2">Tipo</label>
                        <select id="tipo" name="tipo" class="w-full border border-gray-300 rounded-md p-2" onchange="mostrarCategorias()">
                            <option value="1" selected>PRODUCTO</option>
                            <option value="2">SERVICIO</option>
                        </select>
                    </div>
                    <div class="mb-4" id="categoriasProducto" style="display: block;">
                        <label for="categoriaProducto" class="block text-blanco font-medium mb-2">Categoría de Producto:</label>
                        <select id="categoriaProducto" name="categoriaProducto" class="w-full border border-gray-300 rounded-md p-2">
                            <?php 
                                // include('includes/sql.php');
                                $qry_cat_prod = "SELECT * FROM categoria_productos";
                                $res_cat_prod = ejecutar_sql($qry_cat_prod);

                                if ($res_cat_prod->num_rows == 0) {
                                    echo '<option value="1">No hay categorías de productos</option>';
                                } else {
                                    $opciones = '';
                                    while ($row = $res_cat_prod->fetch_assoc()) {
                                        $opciones .= '<option value="'.$row["idcategoria_productos"].'">'.$row["nombre"].'</option>';
                                    }
                                    echo $opciones;
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4" id="categoriasServicio" style="display: none;">
                        <label for="categoriaServicio" class="block text-blanco font-medium mb-2">Categoría de Servicio:</label>
                        <select id="categoriaServicio" name="categoriaServicio" class="w-full border border-gray-300 rounded-md p-2">
                            <?php
                                $qry_cat_serv = "SELECT * FROM categoria_servicios";
                                $res_cat_serv = ejecutar_sql($qry_cat_serv);
                                if($res_cat_serv->num_rows == 0){
                                    echo '<option value="1">No hay categorías de servicios</option>';
                                }else{
                                    $opciones = '';
                                    while ($row = $res_cat_serv->fetch_assoc()) {
                                        $opciones .= '<option value="'.$row["idcategoria_servicios"].'">'.$row["nombre"].'</option>';
                                    }
                                    echo $opciones;
                                }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <input value="Enviar" id="enviar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
                    </div>

                    <script>
                        function mostrarCategorias() {
                            var tipoSeleccionado = document.getElementById("tipo").value;
                            var categoriasProducto = document.getElementById("categoriasProducto");
                            var categoriasServicio = document.getElementById("categoriasServicio");

                            // Oculta ambas secciones de categorías
                            categoriasProducto.style.display = "none";
                            categoriasServicio.style.display = "none";

                            // Muestra la sección de categorías correspondiente al tipo seleccionado
                            if (tipoSeleccionado == "1") {
                                categoriasProducto.style.display = "block";
                            } else if (tipoSeleccionado == "2") {
                                categoriasServicio.style.display = "block";
                            }
                        }
                    </script>
                </form>                
                </div>
</section>
<br>
<?php
    include('../includes/pieadmin.php');
?>