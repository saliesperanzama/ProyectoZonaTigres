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
    $idproducto = $_GET['id'];
    //COMPROBAR QUE NO EXISTA NINGÚN PEDIDO
    $qry_pedidos = "SELECT * FROM pedidos WHERE fk_idproductos = $idproducto";
    $res_pedidos = ejecutar_sql($qry_pedidos);

    if ($res_pedidos->num_rows > 0) {
        ?>
        <script>
            alert('No se puede eliminar el producto porque tiene pedidos pendientes');
            window.location.href = './productos.php';
        </script>
        <?php
    }else{
        $consulta = "SELECT * FROM productos WHERE idproductos = $idproducto";
        $res = ejecutar_sql($consulta);
        $row = $res->fetch_assoc();
        
        if ($row) {
            $qry_delete = "DELETE FROM productos WHERE idproductos = $idproducto";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Producto eliminado correctamente!');
                    window.location.href = './productos.php';
                </script>
            <?php
            }
        }
    }
    
?>