<?php
    include('includes/encabezado2.php');
    include('includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }
    
    function mostrarServicios_emprendedor(){
        $idusuario = $_SESSION['usuario_id'];
        $qry_servicios = "SELECT S.idservicios, S.nombre, S.descripcion, S.precio, S.img_servicio, S.estatus, E.telefono, C.nombre AS categoria, S.fk_idemprendedor, S.estatus
                            FROM servicios S
                            LEFT JOIN emprendedor E ON E.idemprendedor = S.fk_idemprendedor
                            LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
                            LEFT JOIN categoria_servicios C ON C.idcategoria_servicios = S.fk_idcategoria_servicios
                            WHERE E.fk_idusuarios = $idusuario
                            AND (S.estatus= 'V' OR S.estatus= 'NV')";

        $res_servicios = ejecutar_sql($qry_servicios);
        $tabla = '';
        $tabla.= '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tus servicios:</h1>';
        $tabla.= '<div class="flex flex-wrap justify-evenly h-full items-center">';
        if ($res_servicios->num_rows > 0){
            while ($row = $res_servicios->fetch_assoc()){
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $imagen = $row['img_servicio'];
                $estatus = $row['estatus'];
                $categoria = $row['categoria'];
                $telefono = $row['telefono'];
                $emprendedor = $row['fk_idemprendedor'];
                $estatus = $row['estatus'];

                if($estatus == 'V'){
                    $estatus = 'Visible';
                }else if($estatus == 'NV'){
                    $estatus = 'No Visible';
                }
                $tabla.= '<div class="bg-blanco w-96 h-auto rounded-md m-11 shadow-md flex flex-col items-center justify-center">';
                $tabla.= '<div class="mt-4 w-80 flex items-center justify-center" style="height: 320px">';
                $tabla.= '<img src="'.$imagen.'" alt="Imagen No Disponible" class="w-80 mt-4 rounded-md" style="height: 320px"/>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-col justify-center mx-8 mt-4">';
                $tabla.= '<h1 class="font-semibold mb-2 text-center mt-2">'.$nombre.'</h1>';
                $tabla.= '<div class="flex flex-col w-80">';
                $tabla.= '<h1 class="text-sm font-semibold">Descripción:</h1>';
                $tabla.= '<p class="text-justify text-sm">'.$descripcion.'</p>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-row mt-2">';
                $tabla.= '<h1 class="text-sm font-semibold mr-1">Precio:</h1>';
                $tabla.= '<h1 class="text-sm">$'.$precio.'</h1>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-row mt-2">';
                $tabla.= '<svg class="w-4 mr-3 " viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp [#128]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"> </path> </g> </g> </g> </g></svg>';
                $tabla.= '<a class="text-sm" href="https://wa.me/52'.$telefono.'" target="_blank">WhatsApp</a>';
                $tabla.= '</div>';
                $tabla.= '<div class="text-center my-3 flex flex-row justify-start">';
                $tabla.= '<h1 class="text-sm font-semibold mr-1">Estatus:</h1>';
                $tabla.= '<h1 class="text-sm">'.$estatus.'</h1>';
                $tabla.= '</div>';
                $tabla.= '<div class="text-center my-3 flex flex-row justify-center">';
                $tabla.= '<a style="cursor: pointer;"  href="./editar_servicio.php?id=' . $row["idservicios"] . '" class="bg-azul text-blanco font-semibold py-2 px-4 rounded-md hover:bg-blue-900">Editar</a>';
                // $tabla.= '<input type="submit" value="Realizar pedido" class="bg-azul text-blanco font-semibold py-2 px-4 rounded-md hover:bg-blue-900">';
                $tabla.= '</div>';
                $tabla.= '</div>';
                $tabla.= '</div>';
                
            }
            $tabla.= '</div>';
        }else{
            $tabla= '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tus servicios:</h1>';
            $tabla.= '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No tienes servicios registrados</h1>';
        }
        return $tabla;
    }

    function mostrarServicios_estudiante($categoria){
        $qry_servicios = "SELECT S.idservicios, S.nombre, S.descripcion, S.precio, S.img_servicio, S.estatus, E.telefono, C.nombre AS categoria, S.fk_idemprendedor
                            FROM servicios S
                            LEFT JOIN emprendedor E ON E.idemprendedor = S.fk_idemprendedor
                            LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
                            LEFT JOIN categoria_servicios C ON C.idcategoria_servicios = S.fk_idcategoria_servicios
                            WHERE C.idcategoria_servicios = $categoria
                            AND S.estatus= 'V'";

        $res_servicios = ejecutar_sql($qry_servicios);
        $qry_cat_serv = "SELECT * FROM categoria_servicios WHERE idcategoria_servicios = $categoria";
        $res_cat_serv = ejecutar_sql($qry_cat_serv);
        $row_cat_serv = $res_cat_serv->fetch_assoc();
        $categorias = $row_cat_serv['nombre'];
        $tabla = '';
        $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Servicios disponibles</h1>';
        $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">'.$categorias.'</h1>';
        $tabla.= '<div class="flex flex-wrap justify-evenly h-full items-center">';
        if ($res_servicios->num_rows > 0){
            while ($row = $res_servicios->fetch_assoc()){
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $imagen = $row['img_servicio'];
                $estatus = $row['estatus'];
                $categoria = $row['categoria'];
                $telefono = $row['telefono'];
                $emprendedor = $row['fk_idemprendedor'];

                if(trim($emprendedor)==''){
                    $imagen = substr($imagen, 3);
                }
                $tabla.= '<div class="bg-blanco w-96 h-auto rounded-md m-11 shadow-md flex flex-col items-center justify-center">';
                $tabla.= '<div class="w-80 mt-4 flex items-center justify-center" style="height: 320px">';
                $tabla.= '<img src="'.$imagen.'" alt="Imagen No Disponible" class="w-80 mt-4 rounded-md" style="height: 320px"/>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-col justify-center mx-8">';
                $tabla.= '<h1 class="font-semibold mb-2 text-center mt-2">'.$nombre.'</h1>';
                $tabla.= '<div class="flex flex-col w-80">';
                $tabla.= '<h1 class="text-sm font-semibold">Descripción:</h1>';
                $tabla.= '<p class="text-justify text-sm">'.$descripcion.'</p>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-row mt-2">';
                $tabla.= '<h1 class="text-sm font-semibold mr-1">Precio:</h1>';
                $tabla.= '<h1 class="text-sm">$'.$precio.'</h1>';
                $tabla.= '</div>';
                $tabla.= '<div class="flex flex-row mt-2">';
                $tabla.= '<svg class="w-4 mr-3 " viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp [#128]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"> </path> </g> </g> </g> </g></svg>';
                $tabla.= '<a class="text-sm" href="https://wa.me/52'.$telefono.'" target="_blank">WhatsApp</a>';
                $tabla.= '</div>';
                $tabla.= '<br>';
                $tabla.= '<div class="text-center my-3 flex flex-row justify-around">';
                $tabla.= '<a style="cursor: pointer;"  href="./ver_servicio.php?id=' . $row["idservicios"] . '" class="bg-azul text-blanco font-semibold py-2 px-4 rounded-md hover:bg-blue-900">Ver Más</a>';
                // $tabla.= '<input type="button" href="./pedido_producto.php?id=' . $row["idestudiantes"] . '" value="Realizar pedido" class="bg-azul text-blanco font-semibold py-2 px-4 rounded-md hover:bg-blue-900">';
                $tabla.= '</div>';
                $tabla .='<br>';
                $tabla.= '</div>';
                $tabla.= '</div>';
                
            }
            $tabla.= '</div>';
        }else{
            $qry_cat_serv = "SELECT * FROM categoria_servicios WHERE idcategoria_servicios = $categoria";
                $res_cat_serv = ejecutar_sql($qry_cat_serv);
                $row_cat_serv = $res_cat_serv->fetch_assoc();
                $categorias = $row_cat_serv['nombre'];
            $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay servicios disponibles de la categoria: '.$categorias.'</h1>';
        }
        return $tabla;
    }
?>
            <section class ="w-full h-full flex flex-col justify-center items-center">
                <?php

                if ($_SESSION['usuario_tipo'] == "EST"){
                    $qry_categorias_servicios = "SELECT * FROM categoria_servicios";
                    $res_categorias_servicios = ejecutar_sql($qry_categorias_servicios);
                    echo '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Servicios disponibles:</h1>';
                    while($row = $res_categorias_servicios->fetch_array()){
                        $categoria_servicio = $row["idcategoria_servicios"];
                        echo mostrarServicios_estudiante($categoria_servicio);
                    }
                }else if($_SESSION['usuario_tipo'] == "EMP"){
                    echo mostrarServicios_emprendedor();

                    $qry_categorias_servicios = "SELECT * FROM categoria_servicios";
                    $res_categorias_servicios = ejecutar_sql($qry_categorias_servicios);
                    echo '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Servicios disponibles:</h1>';
                    while($row = $res_categorias_servicios->fetch_array()){
                        $categoria_servicio = $row["idcategoria_servicios"];
                        echo mostrarServicios_estudiante($categoria_servicio);
                    }
                }
                    
                ?>
            </section>
        </main>


<?php
    include('includes/pie.php');
?>