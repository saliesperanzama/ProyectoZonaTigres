<?php 
    include ('../includes/utilerias.php');
    include ('../includes/sql.php');
    include ('../includes/encabezadoadmin.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] != "ADMIN"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
    $idestudiante = $_GET['id'];
    $consulta = "SELECT * FROM estudiantes WHERE idestudiantes = $idestudiante";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    $no_de_control = $row['no_de_control'];
    $correo_institucional = $row['correo_institucional'];
?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="../includes/js/registrar_admin.js"></script>
        <section class="h-[850px] flex items-center justify-center">
        <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/3">
          <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Actualización de Estudiante</h1>
          <form onsubmit="return validarNIP();" action="actualizar-manejo_admin2.php" method="post">
                    <div class="mb-4 mr-3">
                        <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
                        <input value="<?php echo $no_de_control ?>" type="text" id="numero_control" name="numero_control" class="w-1/3 border border-gray-300 rounded-md p-2" maxlength="8" required oninput="validarNumeros(this)">
                    </div>
                <div class="mb-6 mr-3">
                        <label for="correo_institucional" class="block text-blanco font-medium mb-2">Correo Institucional:</label>
                        <input value="<?php echo $correo_institucional ?>" type="text" id="correo_institucional" maxlength="60" name="correo_institucional" class="w-full border border-gray-300 rounded-md p-2" required oninput="validarCorreoInstitucional(this)">     
                </div>
                <input type="hidden" name="idestudiante" value="<?php echo $idestudiante ?>">
              <div class="text-center">
                <input value="Actualizar" id="actualizar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
                <button class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja"><a href="estudiantes.php">Cancelar</a></button>
              </div>
          </form>
      </div>
      </section>
    </main>

<?php
    include('../includes/pieadmin.php');
?>
