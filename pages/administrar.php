<?php
    include ('includes/encabezadoadmin2.php');
    session_start();
    if ($_SESSION['usuario_tipo'] != "ADMIN"){
        header('Location: index.php');
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