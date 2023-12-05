<?php 
    include ('../includes/encabezadoadmin.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
?>



<?php
    include('../includes/pieadmin.php');
?>