<?php 
    include('includes/encabezado3.php');
?>

<section class="flex flex-row items-center h-full w-full justify-between">
                <div class="flex flex-col items-center justify-center w-1/3 ml-60">
                    <h1 class="text-blanco text-6xl text-center mb-6">¡Estás a unos pasos!</h1>
                    <p class="text-blanco text-3xl text-justify ">Ingresa los datos de tu producto, envíalos, y a continuación los datos de tu producto serán validados, si tu producto es aceptado te notificaremos de inmediato.</p>
                </div>
               
                <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/4 mr-60">
                  <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Ingresa Los Datos del Producto</h1>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="foto" class="block text-blanco font-medium mb-2">Foto del producto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-md p-2 text-blanco" required>
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-blanco font-medium mb-2">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-blanco font-medium mb-2">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="precio" class="block text-blanco font-medium mb-2">Precio:</label>
                        <input type="number" id="precio" name="precio" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="text-center">
                        <button id="enviar" type="submit" class="bg-naranjam text-blanco font-semibold text-lg py-2 px-4 rounded-md hover:bg-naranja">Enviar</button>
                        <script>
                            document.getElementById('enviar').addEventListener('click', function() {
                                alert('Los datos fueron enviados con éxito. Cuando tu producto sea validado se te notificará.');
                                window.location.href = '../pages/productos.php';
                                return false;                          
                            });
                        </script>
                    </div>
                </form>                
              </div>
</section>

<?php
    include('includes/pie.php');
?>