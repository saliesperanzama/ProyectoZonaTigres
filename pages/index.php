<?php
    include('includes/encabezado.php');
    // Esto va al principio de cada página, y se redirecciona si el tipo de usuario no debe estar ahí
    // Si el usuario sí debe entrar a esta página simplemente se puede omitir la verificación
    session_start();
    //Verificación de que exista una sesión
    if (isset($_SESSION['usuario_tipo'])){
        //Verificación de Administrador
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
        //Verificación de Estudiante
        if ($_SESSION['usuario_tipo'] == "EST"){
            header('Location: productos.php');
        }
        //Verificación de Vendedor
        if ($_SESSION['usuario_tipo'] == "EMP"){
            header('Location: productos.php');
        }
    }
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