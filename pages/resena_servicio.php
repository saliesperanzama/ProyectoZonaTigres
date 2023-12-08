<?php
    include('includes/utilerias.php');
    include('includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }else{
            if(empty($_POST)){
                redireccionar('Prohibido','index.php');
            }
            else{
                $calificacion = $_POST['calificacion'];
                $id = $_POST['id'];
                $comentario = $_POST['comentario'];
                $idusuario = $_SESSION['usuario_id'];
                
                //VERIFICAR
                $qry_ver = "SELECT * FROM resenia_servicios WHERE fk_idusuarios = $idusuario AND fk_idservicios = $id";
                $res_ver = ejecutar_sql($qry_ver);

                if($res_ver->num_rows > 0){
                    ?>
                        <script>
                            alert('Ya has calificado este servicio');
                            window.location.href = '../pages/servicios.php';
                        </script>
                    <?php
                }
                else{
                    $qry_ins = "INSERT INTO resenia_servicios(comentario, calificacion, fk_idservicios, fk_idusuarios) VALUES('$comentario', $calificacion, $id, $idusuario)";
                    $res_ins = ejecutar_sql($qry_ins);

                    if($res_ins){
                        ?>
                            <script>
                                alert('Calificación guardada');
                                window.location.href = '../pages/servicios.php';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert('Error al calificar');
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