<?php 
    include('includes/encabezado3.php');
    // include('includes/sql.php');
    include('includes/utilerias.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }else{
                $idservicio = $_GET['id'];

                $consulta = "SELECT * FROM pedidos WHERE idpedidos = $idservicio";
                $res = ejecutar_sql($consulta);
                $row = $res->fetch_assoc();
                $estatus = $row["estatus"];
                
                if ($row) {
                    if($estatus == "R"){
                        ?>
                        <script>
                            alert('Este servicio ya fue rechazado');
                            window.location.href = './notificaciones.php';
                        </script>
                    <?php
                    }else if($estatus == "E"){
                        ?>
                        <script>
                            alert('Este servicio ya fue completado');
                            window.location.href = './notificaciones.php';
                        </script>
                    <?php
                    }else if($estatus == "A"){
                        ?>
                        <script>
                            alert('Este servicio ya fue aceptado');
                            window.location.href = './notificaciones.php';
                        </script>
                    <?php
                    }else if($estatus == "C"){
                        ?>
                        <script>
                            alert('Este pedido fue cancelado');
                            window.location.href = './notificaciones.php';
                        </script>
                    <?php
                    }else{
                        $qry_updt = "UPDATE pedidos SET estatus = 'A'
                            WHERE idpedidos = $idservicio";
                            
                            $res_udpt = ejecutar_sql($qry_updt);
                            if ($res_udpt) {
                                ?>
                                <script>
                                    alert('Pedido aceptado correctamente!');
                                    window.location.href = './notificaciones.php';
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