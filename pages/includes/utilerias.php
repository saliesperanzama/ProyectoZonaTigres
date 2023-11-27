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
        header('refresh:3;url=' . $dir);
    }
?>