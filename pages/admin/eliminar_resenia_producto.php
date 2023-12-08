2<?php 
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
    $qry = "SELECT * FROM resenia_productos WHERE idresenia_productos = $idproducto";
    $res = ejecutar_sql($qry);

        $row = $res->fetch_assoc();
        
        if ($row) {
            $qry_delete = "DELETE FROM resenia_productos WHERE idresenia_productos = $idproducto";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Reseña eliminada correctamente!');
                    window.location.href = './resenias.php';
                </script>
            <?php
            }
        }
    
    
?>