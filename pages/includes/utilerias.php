<?php
    function redireccionar($mensaje, $dir){
        include('includes/encabezado.php');
        echo '<section class="flex flex-col items-center justify-center h-full">';
        echo '<div class="w-auto h-auto mb-6 text-center">';
        echo '<span class="text-8xl font-bold text-left text-blanco">' . $mensaje . '</span>';
        echo '</div>';
        echo '<h3 class="text-6xl font-bold text-left text-blanco">Redireccionando...</h3>';
        echo '</section>';
        echo '</main>';
        echo '<footer class="bg-gradient-to-t from-azul to-blue-950 text-white py-5 h-32">';
        echo '</footer>';
        echo '</body>';
        echo '</html>';
        //include('includes/pie.php');
        header('refresh:1;url=' . $dir);
    }

    // function redireccionar2($mensaje, $dir){
    //     include('includes/encabezado.php');
    //     echo '<section class="flex flex-col items-center justify-center h-full">';
    //     echo '<div class="w-auto h-auto mb-6 text-center">';
    //     echo '<span class="text-8xl font-bold text-left text-blanco">' . $mensaje . '</span>';
    //     echo '</div>';
    //     echo '<h3 class="text-6xl font-bold text-left text-blanco">Redireccionando...</h3>';
    //     echo '</section>';
    //     echo '</main>';
    //     echo '<footer class="bg-gradient-to-t from-azul to-blue-950 text-white py-5 h-32">';
    //     echo '</footer>';
    //     echo '</body>';
    //     echo '</html>';
    //     //include('includes/pie.php');
    //     header('refresh:3;url=' . $dir);
    // }

    //FUNCION PARA QUE LOS USUARIOS SUBAN IMAGEN 
    function subir_imagen($archivo){
        if(empty($archivo)){
            return null;
        }
        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tam = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.', $nombre);
        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension, $extensiones)){
            echo 'Archivo no válido';
            return null;
        }else if($error > 0){
            echo 'Error al cargar archivo';
            return null;
        }else if($tam > 1000000){
            echo 'Archivo demasiado grande (Máx 1MB)';
            return null;
        }else{
            $nombre_nuevo = uniqid('', true) . '.' . $extension;
            $destino = '../public/users/' . $nombre_nuevo;
            move_uploaded_file($origen, $destino);

            return $destino;
        }
    }

    function subir_imagen_servicio($archivo){
        if(empty($archivo)){
            return null;
        }
        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tam = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.', $nombre);
        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension, $extensiones)){
            ?>
                <script>
                    alert('Archivo no válido');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Archivo no válido';
            return null;
        }else if($error > 0){
            ?>
                <script>
                    alert('Error al cargar archivo');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Error al cargar archivo';
            return null;
        }else if($tam > 1000000){
            ?>
                <script>
                    alert('Archivo demasiado grande (Máx 1MB)');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Archivo demasiado grande (Máx 1MB)';
            return null;
        }else{
            $nombre_nuevo = uniqid('', true) . '.' . $extension;
            $destino = '../public/servicios/' . $nombre_nuevo;
            move_uploaded_file($origen, $destino);

            return $destino;
        }
    }

    function subir_imagen_producto($archivo){
        if(empty($archivo)){
            return null;
        }
        $nombre = $archivo['name'];
        $origen = $archivo['tmp_name'];
        $tam = $archivo['size'];
        $tipo = $archivo['type'];
        $error = $archivo['error'];

        $extensiones = array('jpg', 'jpeg', 'png');

        $nombre_y_ext = explode('.', $nombre);
        $extension = strtolower(end($nombre_y_ext));

        if(!in_array($extension, $extensiones)){
            ?>
                <script>
                    alert('Archivo no válido');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Archivo no válido';
            return null;
        }else if($error > 0){
            ?>
                <script>
                    alert('Error al cargar archivo');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Error al cargar archivo';
            return null;
        }else if($tam > 1000000){
            ?>
                <script>
                    alert('Archivo demasiado grande (Máx 1MB)');
                    window.location.href = './datos_producto.php';
                </script>
            <?php
            // echo 'Archivo demasiado grande (Máx 1MB)';
            return null;
        }else{
            $nombre_nuevo = uniqid('', true) . '.' . $extension;
            $destino = '../public/productos/' . $nombre_nuevo;
            move_uploaded_file($origen, $destino);

            return $destino;
        }
    }
?>