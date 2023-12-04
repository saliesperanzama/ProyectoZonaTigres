<?php
    include ('../includes/encabezadoadmin.php');
    //incluir sql.php
    include ('../includes/sql.php');
    function tabla(){
        $qry_usuarios = "SELECT * FROM usuarios";
        $res_usuarios = ejecutar_sql($qry_usuarios);

        if($res_usuarios->num_rows == 0){
            $tabla = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay usuarios registrados</h1>';
        }else{
            $tabla = '<br>';
            $tabla .= '<h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tabla de usuarios</h1>';
            $tabla .= '<br>';
            $tabla .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla .= '<tr class="text-center">';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">No. de control</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nip</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Correo</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Tipo usuario</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Editar</th>';
            $tabla .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Eliminar</th>';
            $tabla .= '</tr>';
            $tabla .= '</thead>';
            $tabla .= '<tbody>';

            while ($row = $res_usuarios->fetch_assoc()) {
                $tabla .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idusuarios"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] . ' ' . $row["apellido_paterno"] . ' ' . $row["apellido_materno"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["no_de_control"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nip"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["correo_institucional"] . '</td>';
                $tabla .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["tipo_de_usuario"] . '</td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./editar_usuario.php?id=' . $row["idusuarios"] . '"><h1 class="font-bold text-gre" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Editar</h1></a></td>';
                $tabla .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./eliminar_usuario.php?id=' . $row["idusuarios"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Eliminar</h1></a></td>';
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
        <div class="w-full h-auto mt-6 mb-6 text-center flex flex-col items-center justify-center">       
            <?php
                echo tabla();
            ?>
        </div>

        <button id="anadir" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja" onclick="window.location.href='anadir_usuario.php'">Añadir nuevo usuario</button>
        <br>
        <br>
    </section>
</main>


<?php
    include('../includes/pieadmin.php');
?>