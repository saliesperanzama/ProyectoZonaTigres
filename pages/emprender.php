<?php
    include('includes/encabezado3.php');
?>

<section class="flex flex-row items-center h-full w-full justify-between">
                <div class="flex flex-col items-center justify-center w-1/3 ml-60">
                    <h1 class="text-blanco text-6xl text-center mb-6">¡Para todos aquellos que buscan emprender!</h1>
                    <p class="text-blanco text-3xl text-justify ">Si tienes un producto que te gustaria ofrecer a la comunidad, rellena los siguientes datos personales, para despúes colocar los datos de tu producto.</p>
                </div>
               
                <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/4 mr-60">
                    <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Ingresar Datos</h1>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="foto" class="block text-blanco font-medium mb-2">Foto de tu crendencial de estudiante:</label>
                            <input type="file" id="foto" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-md p-2 text-blanco" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-blanco font-medium mb-2">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" class="w-full border border-gray-300 rounded-md p-2" required>
                        </div>
                        <div class="mb-6">
                            <label for="direccion" class="block text-blanco font-medium">Dirección (opcional):</label>
                            <label for="" class="text-blanco mb-3">Solo introduce una dirección en caso de que tengas ventas en tu domicilio.</label>
                            <input id="direccion" name="direccion" class="w-full border border-gray-300 rounded-md p-2">
                        </div>
                        <div class="text-center">
                            <button id="enviar" type="submit" class="bg-naranjam text-blanco font-semibold text-lg py-2 px-4 rounded-md hover:bg-naranja">Enviar</button>
                            <script>
                                document.getElementById('enviar').addEventListener('click', function() {
                                    window.location.href = './datos_producto.php';
                                });
                            </script>
                        </div>
                    </form>
                </div>
</section>

<?php
    include('includes/pie.php');
?>