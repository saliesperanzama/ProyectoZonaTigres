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

    function tabla_productos(){
        $qry_categorias = "SELECT * FROM categoria_productos";
        $res_categorias = ejecutar_sql($qry_categorias);

        if($res_categorias->num_rows == 0){
            $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay categorías  de productos registradas</h1>';
        }else{
            $tabla = '<br>';
            $tabla .= '<h1 class="font-bold text-negro">Tabla de categorías de productos</h1>';
            $tabla .= '<br>';
            $tabla .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla .= '<tr class="text-center">';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Editar</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Eliminar</th>';
            $tabla .= '</tr>';
            $tabla .= '</thead>';
            $tabla .= '<tbody>';

            while ($row = $res_categorias->fetch_assoc()) {
                $tabla .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idcategoria_productos"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] . '</td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;"  href="./editar_cat_prod.php?id=' . $row["idcategoria_productos"] . '"><h1 class="font-bold text-gre" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Editar</h1></a></td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./eliminar_cat_prod.php?id=' . $row["idcategoria_productos"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Eliminar</h1></a></td>';
                $tabla .= '</tr>';
            }

            $tabla .= '</tbody>';
            $tabla .= '</table>';
        }

        return $tabla;
    }

    function tabla_servicios(){
        $qry_categorias = "SELECT * FROM categoria_servicios";
        $res_categorias = ejecutar_sql($qry_categorias);

        if($res_categorias->num_rows == 0){
            $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay categorías de servicios registradas</h1>';
        }else{
            $tabla = '<br>';
            $tabla .= '<h1 class="font-bold text-negro">Tabla de categorías de servicios</h1>';
            $tabla .= '<br>';
            $tabla .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla .= '<tr class="text-center">';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Editar</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Eliminar</th>';
            $tabla .= '</tr>';
            $tabla .= '</thead>';
            $tabla .= '<tbody>';

            while ($row = $res_categorias->fetch_assoc()) {
                $tabla .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idcategoria_servicios"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] . '</td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;"  href="./editar_cat_serv.php?id=' . $row["idcategoria_servicios"] . '"><h1 class="font-bold text-gre" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Editar</h1></a></td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./eliminar_cat_serv.php?id=' . $row["idcategoria_servicios"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Eliminar</h1></a></td>';
                $tabla .= '</tr>';
            }

            $tabla .= '</tbody>';
            $tabla .= '</table>';
        }

        return $tabla;
    }
?>
    <!-- <link rel="stylesheet" href="../../output.css"> -->

    <section class="flex flex-col items-center justify-center w-full h-full">
    <h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tabla de categorías</h1>
        <div class="w-full h-auto mt-6 mb-6 text-center flex flex-row justify-around items-center">       
            <div class="w-full h-auto mt-6 mb-6 text-center flex flex-col justify-center items-center">
                <?php
                    echo tabla_productos();
                ?>
            </div>

            <div class="w-full h-auto mt-6 mb-6 text-center flex flex-col justify-center items-center">
                <?php
                    echo tabla_servicios();
                ?>
            </div>
        </div>
        <button id="anadir" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja" onclick="window.location.href='anadir_categoria.php'">Añadir nueva categoría</button>
        <br>
        <br>
    </section>
</main>


<?php
    include('../includes/pieadmin.php');
?>