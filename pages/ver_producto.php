<?php
    include('includes/encabezado2.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }else{
        header('Location: index.php');
    }
?>
    <section>
                <div class="flex items-center justify-center flex-col">
                        <div class="bg-blanco w-3/4 h-auto rounded-md m-11 shadow-md flex flex-row">
                            <div class="w-full h-auto flex items-center justify-center">
                                <img src="../public/imgs/enchiladas.jpg" alt="Imagen No Disponible" class="my-8 rounded-md">
                            </div>
                            <div class="flex flex-col justify-center mr-36">
                                <h1 class="font-semibold mb-10 text-2xl text-center mt-2">Enchiladas Rojas</h1>
                                <div class="flex flex-col justify-center mb-7">
                                    <h1 class="text-xl font-semibold">Descripción:</h1>
                                    <p class="text-justify">Orden de cuatro enchiladas rojas, con verdura, y salsas de tu elección (salsa suave, salsa picosa, salsa borracha).</p>
                                </div>
                        
                                <div class="flex flex-row mt-2 items-center mb-7">
                                    <h1 class="text-xl font-semibold mr-1">Precio:</h1>
                                    <h1>$80.00</h1>
                                </div>
    
                                <div class="flex flex-row mt-2 items-center mb-7">
                                    <h1 class="text-xl font-semibold mr-1">Venta realizada por:</h1>
                                    <h1>Jesús Parra García</h1>
                                </div>
    
                                <div class="flex flex-row mt-2 items-center mb-7">
                                    <h1 class="text-xl font-semibold mr-1">Horario:</h1>
                                    <h1>08:00-13:00 hrs</h1>
                                </div>
    
                                <div class="flex flex-row mt-2 items-center mb-7">
                                    <svg class="w-3 mr-3" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>whatsapp [#128]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439" id="whatsapp-[#128]"> </path> </g> </g> </g> </g></svg>
                                    <a class="text-xl" href="https://wa.me/523241165470">WhatsApp</a>
                                </div>
                                
                            </div>
    
                        </div>
    
                        <div class="mt-6 p-4 bg-gray-100 rounded-md w-1/3 mb-12">
                            <h2 class="text-2xl font-semibold">Califica este producto</h2>
                            
                            <!-- Formulario de calificación -->
                            <form id="calificacionForm" class="mt-4 ml-5 mb-5">
                                <div class="mb-5">
                                    <label for="calificacion" class="block text-sm font-medium">Tu Calificación:</label>
                                    <select id="calificacion" name="calificacion" class="block w-1/2 mt-1 rounded-md">
                                        <option value="1">1 estrella</option>
                                        <option value="2">2 estrellas</option>
                                        <option value="3">3 estrellas</option>
                                        <option value="4">4 estrellas</option>
                                        <option value="5">5 estrellas</option>
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label for="comentario" class="block text-sm font-medium">Tu Comentario:</label>
                                    <textarea id="comentario" name="comentario" rows="3" class="block w-1/2 rounded-md"></textarea>
                                </div>
                                <button type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja mb-6">Enviar Calificación</button>
                            </form>
                            
                            <h2 class="text-2xl font-semibold">Calificaciones y Comentarios</h2>

                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Alejandra Cisneros</h3>
                                <p class="text-gray-700">Excelente producto, muy sabroso.</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Ángel Jáuregui</h3>
                                <p class="text-gray-700">La salsa estaba desabrida.</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Sandra Esperanza</h3>
                                <p class="text-gray-700">Me gustó mucho, excelente precio.</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Víctor Vázquez</h3>
                                <p class="text-gray-700">Me llegaron frías mis enchiladas, pero estaban muy ricas.</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Juan Graxiola</h3>
                                <p class="text-gray-700">Muy ricas!.</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                            <div class="mt-4 ml-5">
                                <h3 class="text-lg font-semibold">Alexis</h3>
                                <p class="text-gray-700">Recomendado!</p>
                                <div class="flex mt-2">
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                    <span class="text-yellow-400">★</span>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
<?php
    include('includes/pie.php');
?>