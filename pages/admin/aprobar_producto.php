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
    $consulta = "SELECT * FROM productos WHERE idproductos = $idproducto";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
        if ($row) {
            $qry_delete = "UPDATE productos 
                            SET estatus = 'NV'
                            WHERE idproductos = $idproducto";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Solicitud aceptada correctamente!');
                    window.location.href = './solicitudes.php';
                </script>
            <?php
            }
        }else{
        ?>
            <script>
                alert('No existe');
                window.location.href = './solicitudes.php';
            </script>
        <?php
    }
?>