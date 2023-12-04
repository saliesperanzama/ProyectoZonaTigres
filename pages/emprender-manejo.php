<?php
    include('includes/utilerias.php');
    include('includes/sql.php');
    // session_start();
    if(empty($_POST)){
        redireccionar('Prohibido','index.php');
    }
    else{
        $imagen = $_POST['imagen'];
        $telefono = $_POST['telefono'];
        // $no_de_control = $_SESSION['no_de_control'];
        //VERIFICAR SI ESTÁS REGISTRADO
        $consulta_verificar = "SELECT * FROM usuarios WHERE no_de_control = '$no_de_control'";
        $res = ejecutar_sql($consulta_verificar);

        if($res->num_rows > 0){
            echo 'Ya estas registrado';
        }else{
            redireccionar('Error','index.php');
        }
    }
    
?>