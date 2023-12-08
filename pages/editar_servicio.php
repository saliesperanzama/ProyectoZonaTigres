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
    $consulta = "SELECT * FROM servicios WHERE idservicios = $id";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    // $imagen = $row['imagen'];
    $estatus = $row['estatus'];
?>

<section class="flex flex-row items-center h-full w-full justify-around">
                <div class="mt-8 bg-negro p-8 rounded-lg shadow-lg bg-opacity-40" style="width: 40%; margin-top: 50px; margin-bottom: 50px;">
                  <h1 class="font-semibold text-blanco mb-4 text-center">Actualiza Los Datos del Producto o Servicio</h1>
                <form action="editar_producto-manejo.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="foto" class="block text-blanco font-medium mb-2">Foto del producto/servicio:</label>
                        <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-md p-2 text-blanco" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-blanco font-medium mb-2">Nombre:</label>
                        <input value = "<?php echo $nombre ?>" type="text" id="nombre" name="nombre" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-blanco font-medium mb-2">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-md p-2" required><?php echo $descripcion ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-blanco font-medium mb-2">Precio:</label>
                        <input value = "<?php echo $precio ?>" type="number" id="precio" name="precio" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipo" class="block text-blanco font-medium mb-2">Tipo</label>
                        <select id="tipo" name="tipo" class="w-full border border-gray-300 rounded-md p-2" onchange="mostrarCategorias()">
                            <option value="1" >PRODUCTO</option>
                            <option value="2" selected>SERVICIO</option>
                        </select>
                    </div>
                    <div class="mb-4" id="categoriasProducto" style="display: block;">
                        <label for="categoriaProducto" class="block text-blanco font-medium mb-2">Categoría de Producto:</label>
                        <select id="categoriaProducto" name="categoriaProducto" class="w-full border border-gray-300 rounded-md p-2">
                            <?php 
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
                    <div class="mb-4">
                        <label for="estatus" class="block text-blanco font-medium mb-2">Estatus:</label>
                        <select id="estatus" name="estatus" class="w-full border border-gray-300 rounded-md p-2">
                            <?php
                                if($estatus == 'V'){
                                    echo '<option value="1" selected>VISIBLE</option>';
                                    echo '<option value="2">NO VISIBLE</option>';
                                }else{
                                    echo '<option value="1">VISIBLE</option>';
                                    echo '<option value="2" selected>NO VISIBLE</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <input value = "<?php echo $id ?>" type="hidden" id="id" name="id" class="w-full border border-gray-300 rounded-md p-2">
                        <input value="Actualizar" id="Actualizar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
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
<?php
    include('includes/pie.php');
?>