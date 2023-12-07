<?php
    include ('../includes/utilerias.php');
    include ('../includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])) {
        if ($_SESSION['usuario_tipo'] != "ADMIN") {
            header('Location: ../index.php');
        }else{
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];

            if($tipo == 1){
                $qry_ins_cat_prod = "INSERT INTO categoria_productos (nombre) VALUES ('$nombre')";
                $res_ins_cat_prod = ejecutar_sql($qry_ins_cat_prod);
                if($res_ins_cat_prod){
                    ?>
                            <script>
                                alert('Categoria de producto insertada correctamente!');
                                window.location.href = './categorias.php';
                            </script>
                        <?php
                }else{
                    ?>
                            <script>
                                alert('No se pudo insertar la categoria');
                                window.location.href = './categorias.php';
                            </script>
                        <?php
                }
            }else{
                $qry_ins_cat_serv = "INSERT INTO categoria_servicios (nombre) VALUES ('$nombre')";
                $res_ins_cat_serv = ejecutar_sql($qry_ins_cat_serv);
                if($res_ins_cat_serv){
                    ?>
                            <script>
                                alert('Categoria de Servicio insertada correctamente!');
                                window.location.href = './categorias.php';
                            </script>
                        <?php
                }else{
                    ?>
                            <script>
                                alert('No se pudo insertar la categoria');
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