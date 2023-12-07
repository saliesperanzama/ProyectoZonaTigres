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
    $idcatserv = $_GET['id'];
    $consulta = "SELECT * FROM categoria_servicios WHERE idcategoria_servicios = $idcatserv";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    $nombre = $row['nombre'];
?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="../includes/js/registrar_admin.js"></script>
        <section class="h-[850px] flex items-center justify-center">
        <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/3">
          <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Actualización de Categoría Servicios</h1>
          <form action="editar_cat_serv-manejo.php" method="post">
                <div class="mb-6 mr-3">
                        <label for="nombre" class="block text-blanco font-medium mb-2">Nombre de la categoria:</label>
                        <input value="<?php echo $nombre ?>" type="text" id="nombre" maxlength="60" name="nombre" class="w-full border border-gray-300 rounded-md p-2" required>     
                </div>
                <input type="hidden" name="idcatserv" value="<?php echo $idcatserv ?>">
              <div class="text-center">
                <input value="Actualizar" id="actualizar" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
              </div>
          </form>
      </div>
      </section>
    </main>

<?php
    include('../includes/pieadmin.php');
?>
