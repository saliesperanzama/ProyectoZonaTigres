<?php
    include('includes/encabezado3.php');
    // include('includes/sql.php');
    // session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }

                $idusuario = $_SESSION['usuario_id'];
                //VERIFICAR SI ESTÁS REGISTRADO
                $consulta_verificar = "SELECT * FROM emprendedor WHERE fk_idusuarios = '$idusuario'";
                $res = ejecutar_sql($consulta_verificar);

                if($res->num_rows > 0){
                    header('Location: datos_producto.php');
                }
?>

<section class="flex flex-row items-center h-full w-full justify-around">
                <div class="flex flex-col mr-7" style=" width: 40%">
                    <h1 class="text-blanco font-bold text-center" style="font-size: 3rem; line-height: 1;">¡Para todos aquellos que buscan emprender!</h1>
                    <br>
                    <p class="text-blanco text-justify" style="font-size: 3rem; line-height: 1;">Si tienes un producto que te gustaria ofrecer a la comunidad, rellena los siguientes datos personales, para despúes, colocar los datos de tu producto.</p>
                </div>
                <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/3 mr-60">
                    <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Ingresar Datos</h1>
                    <form action="emprender-manejo.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="foto" class="block text-blanco font-medium mb-2">Deja que tus compradores te conozcan!</label>
                            <label for="foto" class="block text-blanco font-medium mb-2">Foto personal:</label>
                            <input type="file" id="foto" name="foto" class="w-full border border-gray-300 rounded-md p-2 text-blanco" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-blanco font-medium mb-2">Teléfono:</label>
                            <input type="text" maxlength="10" id="telefono" name="telefono" class="w-full border border-gray-300 rounded-md p-2" required>
                        </div>
                        <div class="text-center">
                            <input value="Enviar" id="enviar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
                        </div>
                    </form>
                </div>
</section>
<?php
    include('includes/pie.php');
?>