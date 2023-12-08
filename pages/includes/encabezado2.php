<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Tigres</title>
    <link rel="stylesheet" href="../output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<main class="w-full h-auto bg-cover bg-crema">
            <div class="w-screen h-full bg-gradient-to-t from-azul to-blue-950">
                <nav class="container mx-auto flex justify-between items-center">
                    <img src="../public/imgs/logo.png" alt="logo" class="w-32 my-3">
                    <ul class="flex gap-16 text-gris">
                        <a href="./productos.php">
                            <li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Productos</li>
                        </a>
                        <a href="./servicios.php">
                            <li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Servicios</li>
                        </a>
                        <a href="./emprender.php">
                            <li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Emprende</li>
                        </a>
                        <?php
                            include ("includes/sql.php");
                            session_start();
                            if ($_SESSION['usuario_tipo'] == "EMP"){
                                $id = $_SESSION['usuario_id'];
                                $qry_id_emp = "SELECT * 
                                            FROM pedidos P
                                            LEFT JOIN productos PR ON PR.idproductos = P.fk_idproductos
                                            LEFT JOIN emprendedor E ON E.idemprendedor = PR.fk_idemprendedor
                                            LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
                                            WHERE E.fk_idusuarios = $id
                                            AND (P.estatus = 'S' OR P.estatus = 'A')";
                                $res_id = ejecutar_sql($qry_id_emp);
                                if($res_id->num_rows > 0){
                                    echo '<a href="./notificaciones.php">';
                                    echo '<li class="font-medium text-xl hover:border-b-[1.5px] hover:text-rojo border-rojo" style="--tw-text-opacity: 1; color: rgb(255 0 0 / var(--tw-text-opacity)); --tw-border-opacity: 1; border-color: rgb(255 0 0 / var(--tw-border-opacity));">Pedidos</li>';
                                    echo '</a>';
                                }else{
                                    echo '<a href="./notificaciones.php">';
                                    echo '<li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Pedidos</li>';
                                    echo '</a>';
                                }
                                echo '<a href="./mis_pedidos.php">';
                                echo '<li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Mis pedidos</li>';
                                echo '</a>';
                            }else if($_SESSION['usuario_tipo'] == "EST"){
                                echo '<a href="./mis_pedidos.php">';
                                echo '<li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Mis pedidos</li>';
                                echo '</a>';
                            }
                        ?>
                        
                        <a href="./cerrarsesion.php">
                            <li class="text-blanco font-medium text-xl hover:border-b-[1.5px] hover:text-blanco border-blanco">Cerrar Sesión</li>
                        </a>
                    </ul>
                </nav>
            </div>