<?php 
    include('includes/encabezado3.php');
    // include('includes/sql.php');
    include('includes/utilerias.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }else{
            if(empty($_POST)){
                redireccionar('Prohibido','index.php');
            }
            else{
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                // $imagen = $_POST['imagen'];
                $id = $_POST['id'];
                $tipo = $_POST['tipo'];
                $estatus = $_POST['estatus'];
                $usuario = $_SESSION['usuario_id'];
                $qry_emp = "SELECT idemprendedor FROM emprendedor WHERE fk_idusuarios = '$usuario'";
                $res_emp = ejecutar_sql($qry_emp);
                $row_emp = $res_emp->fetch_assoc();
                $id_emprendedor = $row_emp['idemprendedor'];
                
                if($estatus == 1){
                    $estatus = 'V';
                }else if($estatus == 2){
                    $estatus = 'NV';
                }

                if($tipo == 1){
                    //REVISAR MAÑANA PORQUE AUNQUE REVASE LA CANTIDAD SIGUE INSERTANDO CON NULL
                    $categoria = $_POST['categoriaProducto'];
                    $imagen = subir_imagen_producto($_FILES['foto']);
                    if(trim($imagen) == ''){
                        ?>
                            <script>
                                window.location.href = '../pages/editar_producto.php';
                            </script>
                        <?php
                    }else{
                        $ins_producto = "UPDATE productos SET 
                                        nombre = '$nombre', 
                                        descripcion = '$descripcion', 
                                        precio = '$precio', 
                                        img_producto = '$imagen', 
                                        estatus = '$estatus', 
                                        fk_idcategoria_productos = $categoria
                                        WHERE idproductos = $id";
                        $res_ins = ejecutar_sql($ins_producto);
                        if($res_ins){
                            ?>
                                <script>
                                    alert('Producto actualizado!');
                                    window.location.href = '../pages/productos.php';
                                </script>
                            <?php
                        }
                    }
                }else{
                    $categoria = $_POST['categoriaServicio'];
                    $imagen = subir_imagen_servicio($_FILES['foto']);
                    if(trim($imagen) == ''){
                        ?>
                            <script>
                                window.location.href = '../pages/editar_servicio.php';
                            </script>
                        <?php
                    }else{
                        $ins_servicio ="UPDATE servicios SET 
                                        nombre = '$nombre', 
                                        descripcion = '$descripcion', 
                                        precio = '$precio', 
                                        img_servicio = '$imagen', 
                                        estatus = '$estatus', 
                                        fk_idcategoria_servicios = $categoria
                                        WHERE idservicios = $id";
                        $res_ins = ejecutar_sql($ins_servicio);
                        if($res_ins){
                            ?>
                                <script>
                                    alert('Servicio actualizado!');
                                    window.location.href = '../pages/servicios.php';
                                </script>
                            <?php
                        }
                    }

                    
                }
            }
        }
    }else{
        header('Location: index.php');
    }
?>
