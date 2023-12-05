<?php 
    session_start();
    if(isset($_SESSION['usuario_tipo'])){
        session_unset();//elimina las varibles que se hayan hecho en la sesion
        session_destroy();//Cierra sesion
        header('Location: index.php');
    }else{
        header('Location: iniciar.php');
    }
?>