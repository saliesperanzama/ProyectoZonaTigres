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
                $id = $_POST['id'];
                $cantidad = $_POST['cantidad'];
                $total = $_POST['total'];
                $fecha = $_POST['fecha_entrega'];
                $idusuario = $_SESSION['usuario_id'];
                $telefono = $_POST['contacto'];

                $verificar_pedido = "SELECT * FROM pedidos 
                                    WHERE fk_idproductos = $id
                                    AND fecha_entrega = '$fecha'
                                    AND fk_idusuarios = $idusuario";
                $res_verificar = ejecutar_sql($verificar_pedido);

                if($res_verificar->num_rows > 0){
                    ?>
                        <script>
                            alert('Ya existe el pedido para esta fecha');
                            window.location.href = '../pages/productos.php';
                        </script>
                    <?php
                }else{
                    $insertar = "INSERT INTO pedidos (fk_idproductos, cantidad, total, fecha_entrega, fk_idusuarios, estatus, telefono)
                                VALUES ($id, $cantidad, $total, '$fecha', $idusuario, 'S', '$telefono')";
                    $ejecutar = ejecutar_sql($insertar);
                    if($ejecutar){
                        ?>
                        <script>
                            alert('Pedido realizado, checa el estatus en Mis Pedidos');
                            window.location.href = '../pages/mis_pedidos.php';
                        </script>
                    <?php
                    }else{
                        ?>
                            <script>
                                alert('Error al realizar pedido');
                                window.location.href = '../pages/productos.php';
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
