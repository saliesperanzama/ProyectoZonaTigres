<?php
    include ('includes/encabezadoadmin2.php');
    include ('includes/utilerias.php');

    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: productos.php');
        }
    }else{
        header('Location: iniciar.php');
    }
    
?>
    <section class="flex items-center justify-center h-full">
                <div class="w-auto h-auto mb-6 text-center">
                    <span class="text-8xl font-bold text-left text-blanco">¡Bienvenido Administrador!</span>
                </div>
        </section>
</main>
<?php
    include('includes/pie.php');
?>