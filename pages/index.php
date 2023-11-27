<?php
    include('includes/encabezado.php');
    // Incluye el archivo que contiene la función
    require "includes/sql.php";

    // Consultar
    // $idConsulta = 2;
    // $resultados = consultaPrueba($idConsulta);
    // print_r($resultados);

    // Registrar
    // registraPrueba("Hola");

    // Editar
    // $idConsulta = 3;
    // $nuevoMensaje = "Adiós";
    // editaPrueba($idConsulta,$nuevoMensaje);

    // Borrar
    // $idConsulta = 2;
    // eliminaPrueba($idConsulta);
    
?>
        <section class="flex items-center justify-center h-full">
            <div class="w-auto h-auto flex flex-col justify-center items-center mx-auto">
                <div class="w-auto h-auto mb-6 text-center">
                    <span class="text-8xl font-bold text-left text-blanco">¡Bienvenidos!</span>
                </div>
        
                <div class="text-blanco text-5xl w-2/4 h-auto text-justify">
                    <span>Aquí encontrarás diversos alimentos y servicios que ofrecen los estudiantes del Instituto Tecnológico de Tepic.</span>
                </div>
            </div>
        </section>

<?php
    include('includes/pie.php');
?>