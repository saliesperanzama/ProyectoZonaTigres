<?php
    include('includes/encabezado2.php');
    // include('includes/sql.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }

    function tabla_pedidos(){
        $idusuario = $_SESSION['usuario_id'];
        $qry_pedidos = "SELECT P.idpedidos, P.cantidad, P.total, P.estatus, P.telefono, P.fecha_entrega, P.estatus, U.nombre, U.apellido_paterno, PR.nombre AS nombre_producto
                        FROM pedidos P
                        LEFT JOIN productos PR ON PR.idproductos = P.fk_idproductos
                        LEFT JOIN emprendedor E ON E.idemprendedor = PR.fk_idemprendedor
                        LEFT JOIN usuarios U ON U.idusuarios = E.fk_idusuarios
                        WHERE E.fk_idusuarios = $idusuario";
        $res_pedidos = ejecutar_sql($qry_pedidos);

        if ($res_pedidos->num_rows == 0) {
            $tabla_servicios = '<h1 class="font-bold" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">No tienes pedidos</h1>';
        }else{
            $tabla_servicios = '<br>';
            // $tabla_servicios .= '<h1 class="text-negro font-bold text-xl">Servicios</h1>';
            $tabla_servicios .= '<table class="w-auto text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300 dark:border-gray-700  style="border-collapse: collapse; border-width: 5px;">';
            $tabla_servicios .= '<thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">';
            $tabla_servicios .= '<tr class="text-center">';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Nombre</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Teléfono de contacto</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Producto</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Fecha Entrega</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Cantidad</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Total</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Estatus</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Aceptar</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Rechazar</th>';
            $tabla_servicios .= '<th scope="col" class="text-blanco px-6 py-3 border border-gray-300 dark:border-gray-700" style="background-color: rgb(113 113 122 / var(--tw-bg-opacity));">Completado</th>';
            $tabla_servicios .= '</tr>';
            $tabla_servicios .= '</thead>';
            $tabla_servicios .= '<tbody>';

            $fechaActual = date('Y-m-d');
            while($row = $res_pedidos->fetch_assoc()){
                $estatus = $row["estatus"];
                $fechaEntrega = $row["fecha_entrega"];
                if($estatus == "S"){
                    $estatus = "Solicitado";
                }else if($estatus == "A"){
                    $estatus = "Aceptado";
                }else if($estatus == "R"){
                    $estatus = "Rechazado";
                }else if($estatus == "E"){
                    $estatus = "Entregado";
                }else{
                    $estatus = "Cancelado";
                }
                if(strtotime($fechaEntrega) <= strtotime($fechaActual)){
                    $qry_updt = "UPDATE pedidos SET estatus = 'V' WHERE idpedidos = " . $row["idpedidos"];
                    ejecutar_sql($qry_updt);
                    $estatus = "Vencido";
                }

                $tabla_servicios .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre"] .' '. $row["apellido_paterno"] .'</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["telefono"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["nombre_producto"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["fecha_entrega"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $row["cantidad"] . '</td>';
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' .'$'. $row["total"] . '</td>';   
                $tabla_servicios .= '<td class="font-semibold px-6 py-4 border border-gray-300 dark:border-gray-700">' . $estatus . '</td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./aceptar_pedido.php?id=' . $row["idpedidos"] . '"><h1 class="font-bold text-green" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Aceptar</h1></a></td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./rechazar_pedido.php?id=' . $row["idpedidos"] . '"><h1 class="font-bold text-red" style="--tw-text-opacity: 1; color: rgb(185 28 28 / var(--tw-text-opacity));">Rechazar</h1></a></td>';
                $tabla_servicios .= '<td class="px-6 py-4 border border-gray-300 dark:border-gray-700 text-center" ><a style="cursor: pointer;" href="./completar_pedido.php?id=' . $row["idpedidos"] . '"><h1 class="font-bold text-green" style="--tw-text-opacity: 1; color: rgb(22 163 74 / var(--tw-text-opacity));">Completado</h1></a></td>';
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
        <h1 class="font-bold text-xl" style="--tw-text-opacity: 1; color: rgb(255 80 0 / var(--tw-text-opacity));">Tabla de pedidos</h1>
        <?php
                echo tabla_pedidos();
            ?>
        </div>
            <!-- <button id="anadir" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja" onclick="window.location.href='anadir_producto.php'">Añadir nuevo servicio</button> -->
        <br>
    </section>
</main>

<?php
    include('includes/pie.php');
?>