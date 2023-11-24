<?php

$numero_control = $_POST['numero_control'];
$nip = $_POST['nip'];

    if($numero_control == "admin" && $nip == "admin"){
        
        $_SESSION['usuario'] = 'Administrador';

        header("Location: ../admin/index.php");
    }
    else{
        header("Location: ./productos.php");
    }
?>