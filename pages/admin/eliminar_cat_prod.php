<?php 
    include ('../includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
    $idcatprod = $_GET['id'];
    $consulta = "SELECT * FROM categoria_productos WHERE idcategoria_productos = $idcatprod";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    //VERIFICAR NO HAYA PRODUCTOS CON ESA CATEGORIA
    $consulta2 = "SELECT * FROM productos WHERE fk_idcategoria_productos = '$idcatprod'";
    $res2 = ejecutar_sql($consulta2);

    if($res2->num_rows == 0) {
        if ($row) {
            $qry_delete = "DELETE FROM categoria_productos WHERE idcategoria_productos = $idcatprod";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Categoria eliminada correctamente!');
                    window.location.href = './categorias.php';
                </script>
            <?php
            }
        }
    }else{
        ?>
            <script>
                alert('No se pudo eliminar la categoria ya que se encuentra registrado algún producto');
                window.location.href = './categorias.php';
            </script>
        <?php
    }
    
?>