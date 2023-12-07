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
        $qry_productos = "SELECT * FROM productos WHERE (estatus = 'R' OR estatus = 'NA')
                            ORDER BY estatus DESC";
        $res_productos = ejecutar_sql($qry_productos);

        if ($res_productos->num_rows == 0) {
            $tabla_productos = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay solicitudes de productos</h1>';
        }else{
            $tabla_productos = '<br>';
            $tabla_productos .= '<h1 class="text-negro font-bold text-xl">Productos</h1>';
            $tabla_productos .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla_productos .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla_productos .= '<tr class="text-center">';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Descripción</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Precio</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Imagen</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Estatus</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Aprobar</th>';
            $tabla_productos .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">No aprobar</th>';
            $tabla_productos .= '</tr>';
            $tabla_productos .= '</thead>';
            $tabla_productos .= '<tbody>';

            

            while($row = $res_productos->fetch_assoc()){
                $estatus = $row["estatus"];
                if($estatus == "R"){
                    $estatus = "Revisión";
                }else if($estatus == "A"){
                    $estatus = "Aprobado";
                }else if($estatus == "NA"){
                    $estatus = "No aprobado";
                }else if($estatus == "V"){
                    $estatus = "Visible";
                }else if($estatus == "NV"){
                    $estatus = "No visible";
                }

                $tabla_productos .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idproductos"] . '</td>';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] . '</td>';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["descripcion"] . '</td>';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' .'$'. $row["precio"] . '</td>';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700"><img src="../' . $row["img_producto"] .'" width="100" height="100"></td>';
                $tabla_productos .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $estatus . '</td>';
                $tabla_productos .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;"  href="./aprobar_producto.php?id=' . $row["idproductos"] . '"><h1 class="font-bold text-gre" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Aceptar</h1></a></td>';
                $tabla_productos .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./rechazar_producto.php?id=' . $row["idproductos"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Rechazar</h1></a></td>';
                $tabla_productos .= '</tr>';
            }
            $tabla_productos .= '</tbody>';
            $tabla_productos .= '</table>';
        }
        return $tabla_productos;
    }

    function tabla_servicios(){
        $qry_servicios = "SELECT * FROM servicios WHERE (estatus = 'R' OR estatus = 'NA')
                            ORDER BY estatus DESC";
        $res_servicios = ejecutar_sql($qry_servicios);

        if ($res_servicios->num_rows == 0) {
            $tabla_servicios = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No hay solicitudes de servicios</h1>';
        }else{
            $tabla_servicios = '<br>';
            $tabla_servicios .= '<h1 class="text-negro font-bold text-xl">Servicios</h1>';
            $tabla_servicios .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla_servicios .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla_servicios .= '<tr class="text-center">';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">ID</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Descripción</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Precio</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Imagen</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Estatus</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Aprobar</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">No aprobar</th>';
            $tabla_servicios .= '</tr>';
            $tabla_servicios .= '</thead>';
            $tabla_servicios .= '<tbody>';

            while($row = $res_servicios->fetch_assoc()){
                $estatus = $row["estatus"];
                if($estatus == "R"){
                    $estatus = "Revisión";
                }else if($estatus == "A"){
                    $estatus = "Aprobado";
                }else if($estatus == "NA"){
                    $estatus = "No aprobado";
                }else if($estatus == "V"){
                    $estatus = "Visible";
                }else if($estatus == "NV"){
                    $estatus = "No visible";
                }

                $tabla_servicios .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["idservicios"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["descripcion"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' .'$'. $row["precio"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700"><img src="../' . $row["img_servicio"] .'" width="100" height="100"></td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $estatus . '</td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;"  href="./aprobar_servicio.php?id=' . $row["idservicios"] . '"><h1 class="font-bold text-gre" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Aceptar</h1></a></td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./rechazar_servicio.php?id=' . $row["idservicios"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Rechazar</h1></a></td>';
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
        <h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tablas de solicitudes</h1>
            <?php
                echo tabla_productos();
            ?>
        <br>
        <?php
                echo tabla_servicios();
            ?>
        </div>
        <!-- <button id="anadir" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja" onclick="window.location.href='anadir_estudiante.php'">Añadir nueva solicitud</button>
        <br> -->
        <br>
    </section>
</main>

<?php
    include('../includes/pieadmin.php');
?>