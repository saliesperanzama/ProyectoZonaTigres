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
    $idusuario = $_GET['id'];
    // echo $idusuario;
    $consulta = "SELECT * FROM usuarios WHERE idusuarios = $idusuario";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    
    if ($row) {
        $qry_delete = "DELETE FROM usuarios WHERE idusuarios = $idusuario";
        $res_delete = ejecutar_sql($qry_delete);
        if ($res_delete) {
            ?>
            <script>
                alert('Usuario actualizado correctamente!');
                window.location.href = './usuarios.php';
            </script>
        <?php
        }
    }
?>