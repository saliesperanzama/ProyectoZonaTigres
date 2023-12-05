<?php 
    include ('../includes/encabezadoadmin.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="../includes/js/registrar_admin.js"></script>
        <section class="h-[850px] flex items-center justify-center">
        <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/3">
          <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Registro de Estudiante</h1>
          <form onsubmit="return validarNIP();" action="registrar-manejo_admin2.php" method="post">
                <div class="mb-4 mr-3">
                    <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
                    <input type="text" id="numero_control" name="numero_control" class="w-full border border-gray-300 rounded-md p-2" maxlength="8" required oninput="validarNumeros(this)">
                </div>
                <div class="mb-6 mr-3">
                        <label for="correo_institucional" class="block text-blanco font-medium mb-2">Correo Institucional:</label>
                        <input type="text" id="correo_institucional" maxlength="60" name="correo_institucional" class="w-full border border-gray-300 rounded-md p-2" required oninput="validarCorreoInstitucional(this)">     
                </div>
              <div class="text-center">
                <input value="Registrar" id="registrar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
              </div>
          </form>
      </div>
      </section>
    </main>
<?php
    include('../includes/pieadmin.php');
?>
