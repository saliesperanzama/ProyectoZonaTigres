<?php
    include('includes/encabezado2.php');
    // include ('includes/sql.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }
    $idproducto = $_GET['id'];
    function ver_mas(){
        $idproducto = $_GET['id'];
        $qry_producto ="SELECT P.nombre AS producto, P.descripcion, P.precio, P.img_producto, E.telefono, E.img_personal, U.nombre, U.apellido_paterno
                        FROM productos P
                        LEFT JOIN emprendedor E ON E.idemprendedor = P.fk_idemprendedor
                        LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
                        WHERE P.idproductos = $idproducto";
        $res_producto = ejecutar_sql($qry_producto);
        while( $row = $res_producto->fetch_assoc()){
            $nombre = $row['producto'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $imagen = $row['img_producto'];
            $telefono = $row['telefono'];
            $img_personal = $row['img_personal'];
            $nombre_emprendedor = $row['nombre'];
            $apellido_paterno = $row['apellido_paterno'];


            $card_producto = '<div class="bg-blanco w-3/4 rounded-md m-11 shadow-md flex flex-row" style = "height: 700px">';
            $card_producto.= '<div class="w-auto h-auto flex items-center justify-center mx-6" style="margin-right: 50px; margin-left: 50px;">';
            $card_producto.= '<img src="'.$imagen.'" alt="Imagen No Disponible" class="rounded-md" style = "width: 500px; height: 500px; object-fit: cover">';
            $card_producto.= '</div>';
            $card_producto.= '<div class="flex flex-col justify-center"  style="margin-right: 50px; margin-left: 50px; margin-top: 100px; margin-bottom: 100px">';
            $card_producto.= '<h1 class="font-semibold mb-10 text-2xl text-center mt-2">'.$nombre.'</h1>';
            $card_producto.= '<div class="flex flex-col justify-center mb-7">';
            $card_producto.= '<h1 class="text-xl font-semibold">Descripción:</h1>';
            $card_producto.= '<p class="text-justify">'.$descripcion.'.</p>';
            $card_producto.= '</div>';
            $card_producto.= '<div class="flex flex-row mt-2 items-center mb-7">';
            $card_producto.= '<h1 class="text-xl font-semibold mr-1">Precio:</h1>';
            $card_producto.= '<h1>$'.$precio.'</h1>';
            $card_producto.= '</div>';
            $card_producto.= '<div class="flex flex-row mt-2 justify-between mb-7">';
            $card_producto.= '<div class="flex flex-col justify-start" >';
            $card_producto.= '<div class="flex flex-row justify-center items-center mr-1">';
            $card_producto.= '<h1 class="text-xl font-semibold mr-1">Venta realizada por:</h1>';
            $card_producto.= '<h1>'.$nombre_emprendedor.' '.$apellido_paterno.'</h1>';
            $card_producto.= '</div>';
            $card_producto.= '<div class="flex flex-row mt-2 items-center mb-7">';
            $card_producto.= ' <svg class="w-6 mr-3 " viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp [#128]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"> </path> </g> </g> </g> </g></svg>';
            $card_producto.= '<a class="text-xl" target="_blank" href="https://wa.me/52'.$telefono.'">WhatsApp</a>';
            $card_producto.= '</div>';
            $card_producto.= '</div>';
            $card_producto.= '<div class="flex flex-row mt-2 items-center mb-7" style="width: 300px; height: 300px">';
            $card_producto.= '<img src="'.$img_personal.'" alt="Imagen No Disponible" class="rounded-md w-full h-full" style = "object-fit: cover">';
            $card_producto.= '</div>';
            $card_producto.= '</div>';
            $card_producto.= '</div>';
            $card_producto.= '</div>';
        }
        return $card_producto;
    }

    function ver_calificacion(){
        $idproducto = $_GET['id'];
        $qry_resenas = "SELECT RP.comentario, RP.calificacion, U.nombre, U.apellido_paterno
                        FROM resenia_productos RP
                        LEFT JOIN usuarios U ON U.idusuarios = RP.fk_idusuarios
                        LEFT JOIN productos P ON P.idproductos = RP.fk_idproductos
                        WHERE RP.fk_idproductos = $idproducto";

        $res_resenas = ejecutar_sql($qry_resenas);
        $calificaciones = '';
        if($res_resenas->num_rows > 0){
            while($row = $res_resenas->fetch_assoc()){
                $comentario = $row['comentario'];
                $calificacion = $row['calificacion'];
                $nombre = $row['nombre'];
                $apellidop = $row['apellido_paterno'];

                if($calificacion == 1){
                    $calificacion = '<span class="text-yellow-400">★</span>';
                }else if($calificacion == 2){
                    $calificacion = '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                }else if($calificacion == 3){
                    $calificacion = '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                }else if($calificacion == 4){
                    $calificacion = '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                }else if($calificacion == 5){
                    $calificacion = '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                    $calificacion.= '<span class="text-yellow-400">★</span>';
                }

                $calificaciones.= '<div class="mt-4 ml-5">';
                $calificaciones.= '<h3 class="text-lg font-semibold">'.$nombre.' '.$apellidop.'</h3>';
                $calificaciones.= '<div class="flex mt-2">';
                $calificaciones.= $calificacion;
                $calificaciones.= '</div>';
                $calificaciones.= '<p class="text-gray-700">'.$comentario.'</p>';
                $calificaciones.= '</div>';
            }
        }else{
            $calificaciones = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay calificaciones</h1>';
        }
        return $calificaciones;
    }
?>
            <section>
                <div class="flex items-center justify-center flex-col">
                        <?php
                            echo ver_mas();          
                        ?>   
                        <div class="mt-6 p-4 bg-gray-100 rounded-md mb-6" style="width: 50%">
                            <h2 class="text-2xl font-semibold">Califica este producto</h2>
                            
                            <!-- Formulario de calificación -->
                            <form id="calificacionForm" class="mt-4 ml-5 mb-5" action="resena_producto.php" method="POST">
                                <div class="mb-5">
                                    <label for="calificacion" class="block text-sm font-medium">Tu Calificación:</label>
                                    <select id="calificacion" name="calificacion" class="w-full border border-gray-300 rounded-md p-2">
                                        <option value="1">1 estrella</option>
                                        <option value="2">2 estrellas</option>
                                        <option value="3">3 estrellas</option>
                                        <option value="4">4 estrellas</option>
                                        <option value="5">5 estrellas</option>
                                    </select>
                                </div>
                                <br>
                                <div class="mb-5">
                                    <label for="comentario" class="block text-sm font-medium">Tu Comentario:</label>
                                    <textarea id="comentario" name="comentario" rows="3" class="block w-full rounded-md"></textarea>
                                </div>
                                <br>
                                <div>
                                <input type="hidden" name="id" value="<?php echo $idproducto; ?>">
                                <input type="submit" value="Enviar Calificación" class=" bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja mb-6">
                                </div>
                            </form>
                            
                            <h2 class="text-2xl font-semibold">Calificaciones y Comentarios</h2>

                            <?php
                                echo ver_calificacion();
                            ?>
                            
                        </div>
                </div>
            </section>
<?php
    include('includes/pie.php');
?>