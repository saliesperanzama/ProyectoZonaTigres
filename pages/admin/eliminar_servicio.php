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
    $idservicio = $_GET['id'];

        $consulta = "SELECT * FROM servicios WHERE idservicios = $idservicio";
        $res = ejecutar_sql($consulta);
        $row = $res->fetch_assoc();
        
        if ($row) {
            $qry_delete = "DELETE FROM servicios WHERE idservicios = $idservicio";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Servicio eliminado correctamente!');
                    window.location.href = './servicios.php';
                </script>
            <?php
            }
        }
?>