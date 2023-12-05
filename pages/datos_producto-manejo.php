<?php 
    include('includes/encabezado3.php');
    include('includes/sql.php');
    include('includes/utilerias.php');
    session_start();
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
                
                $tipo = $_POST['tipo'];

                $usuario = $_SESSION['usuario_id'];
                $qry_emp = "SELECT idemprendedor FROM emprendedor WHERE fk_idusuarios = '$usuario'";
                $res_emp = ejecutar_sql($qry_emp);
                $row_emp = $res_emp->fetch_assoc();
                $id_emprendedor = $row_emp['idemprendedor'];

                if($tipo == 1){
                    //REVISAR MAÑANA PORQUE AUNQUE REVASE LA CANTIDAD SIGUE INSERTANDO CON NULL
                    $categoria = $_POST['categoriaProducto'];
                    $imagen = subir_imagen_producto($_FILES['foto']);
                    echo $imagen;
                    if(trim($imagen) == ''){
                        ?>
                            <script>
                                window.location.href = '../pages/datos_producto.php';
                            </script>
                        <?php
                    }else{
                        $ins_producto = "INSERT INTO productos (nombre, descripcion, precio, img_producto, estatus, fk_idemprendedor, fk_idcategoria_productos)
                                    VALUES ('$nombre', '$descripcion', '$precio', '$imagen', 'R', $id_emprendedor, $categoria)";
                        $res_ins = ejecutar_sql($ins_producto);
                        if($res_ins){
                            ?>
                                <script>
                                    alert('Producto enviado! Espere a su aprobación');
                                    window.location.href = '../pages/productos.php';
                                </script>
                            <?php
                        }
                    }
                }else{
                    $categoria = $_POST['categoriaServicio'];
                    $imagen = subir_imagen_servicio($_FILES['foto']);
                    $ins_servicio = "INSERT INTO servicios (nombre, descripcion, precio, img_servicio, estatus, fk_idemprendedor, fk_idcategoria_servicios)
                                    VALUES ('$nombre', '$descripcion', '$precio', '$imagen', 'R', $id_emprendedor, $categoria)";
                    $res_ins = ejecutar_sql($ins_servicio);
                    if($res_ins){
                        ?>
                            <script>
                                alert('Servicio enviado! Espere a su aprobación');
                                window.location.href = '../pages/servicios.php';
                            </script>
                        <?php
                    }
                }
            }
        }
    }else{
        header('Location: index.php');
    }
?>
