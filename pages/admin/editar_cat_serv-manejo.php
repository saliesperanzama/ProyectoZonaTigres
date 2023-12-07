<?php
    include('../includes/utilerias.php');
    include('../includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }else{
            if(empty($_POST)){
                header('Location: ../index.php');
            }else{
                // echo "entro4";
                $nombre = $_POST['nombre'];
                $idcatserv = $_POST['idcatserv'];
                $verificar = "SELECT * FROM categoria_servicios WHERE idcategoria_servicios = '$idcatserv'";
                $res_verificar = ejecutar_sql($verificar);
                $row = $res_verificar->fetch_assoc();
                if($res_verificar->num_rows!=0){
                    $qry_updt = "UPDATE categoria_servicios 
                                SET nombre = '$nombre'
                                WHERE idcategoria_servicios = '$idcatserv'";
                    $res_updt = ejecutar_sql($qry_updt);
                    if($res_updt){
                        ?>
                            <script>
                                alert('Categoria de servicios actualizada correctamente!');
                                window.location.href = './categorias.php';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert('No se pudo actualizar la categoria de servicios');
                                window.location.href = './categorias.php';
                            </script>
                        <?php
                    }
                }else{
                    ?>
                        <script>
                            alert('No se encontró la categoria de servicios');
                            window.location.href = './categorias.php';
                        </script>
                    <?php
                }
            }
        }
    }else{
        header('Location: ../index.php');
    }
?>