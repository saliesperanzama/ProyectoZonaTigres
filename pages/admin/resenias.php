<?php 
    include ('../includes/encabezadoadmin.php');
    include ('../includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }

    function tabla_pedidos(){
        $qry_pedidos = "SELECT * FROM resenia_productos";
        $res_pedidos = ejecutar_sql($qry_pedidos);

        if ($res_pedidos->num_rows == 0) {
            $tabla_servicios = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay comentarios de productos</h1>';
        }else{
            $tabla_servicios = '<br>';
            // $tabla_servicios .= '<h1 class="text-negro font-bold text-xl">Servicios</h1>';
            $tabla_servicios .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla_servicios .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla_servicios .= '<tr class="text-center">';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Comentario</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Calificacion</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Eliminar</th>';
            $tabla_servicios .= '</tr>';
            $tabla_servicios .= '</thead>';
            $tabla_servicios .= '<tbody>';

            while($row = $res_pedidos->fetch_assoc()){
                $tabla_servicios .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idresenia_productos"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["comentario"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["calificacion"] . '</td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./eliminar_resenia_producto.php?id=' . $row["idresenia_productos"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Eliminar</h1></a></td>';
                $tabla_servicios .= '</tr>';
            }
            $tabla_servicios .= '</tbody>';
            $tabla_servicios .= '</table>';
        }
        return $tabla_servicios;
    }

    function tabla_servicios(){
        $qry_pedidos = "SELECT * FROM resenia_servicios";
        $res_pedidos = ejecutar_sql($qry_pedidos);

        if ($res_pedidos->num_rows == 0) {
            $tabla_servicios = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay comentarios de servicios</h1>';
        }else{
            $tabla_servicios = '<br>';
            // $tabla_servicios .= '<h1 class="text-negro font-bold text-xl">Servicios</h1>';
            $tabla_servicios .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla_servicios .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla_servicios .= '<tr class="text-center">';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Comentario</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Calificacion</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Eliminar</th>';
            $tabla_servicios .= '</tr>';
            $tabla_servicios .= '</thead>';
            $tabla_servicios .= '<tbody>';

            while($row = $res_pedidos->fetch_assoc()){
                $tabla_servicios .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idresenia_servicios"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["comentario"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["calificacion"] . '</td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./eliminar_resenia_servicio.php?id=' . $row["idresenia_servicios"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Eliminar</h1></a></td>';
                $tabla_servicios .= '</tr>';
            }
            $tabla_servicios .= '</tbody>';
            $tabla_servicios .= '</table>';
        }
        return $tabla_servicios;
    }
?>
    <!-- <link rel="stylesheet" href="../../output.css"> -->

    <section class="flex flex-col items-center justify-center w-full h-full">
        <div class="w-full h-auto mt-6 mb-6 text-center flex flex-col items-center justify-center">       
        <h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tablas de comentarios de productos</h1>
        <?php
            echo tabla_pedidos();    
        ?>
        <br>
        <br>
        <h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tablas de comentarios de servicios</h1>
        <?php
            echo tabla_servicios();    
        ?>
        </div>
            <!-- <button id="anadir" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja" onclick="window.location.href='anadir_producto.php'">Añadir nuevo servicio</button> -->
        <br>
    </section>
</main>

<?php
    include('../includes/pieadmin.php');
?>