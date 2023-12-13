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
        //VERIFICAR QUE NO SEA EMPRENDEDOR
        $consulta2 = "SELECT * FROM usuarios WHERE idusuarios = $idusuario AND (tipo_de_usuario = 'EMP' OR tipo_de_usuario = 'ADMIN')";
        $res2 = ejecutar_sql($consulta2);
        if ($res2->num_rows > 0) {
            ?>
                <script>
                    alert('No se puede eliminar el usuario porque es un emprendedor o administrador!');
                    window.location.href = './usuarios.php';
                </script>
            <?php
        }else{
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
        
    }
?>