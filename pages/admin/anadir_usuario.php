<?php 
    include ('../includes/encabezadoadmin.php');
?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="../includes/js/registrar_admin.js"></script>
        <section class="h-[850px] flex items-center justify-center">
        <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/3">
          <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Registro de Usuario</h1>
          <form onsubmit="return validarNIP();" action="registrar-manejo_admin.php" method="post">
              <div class="mb-4">
                  <div class="flex flex-row">
                    <div>
                        <label for="nombre" class="block text-blanco font-medium mb-2">Nombre(s):</label>
                        <input maxlength="60" type="text" id="nombre" name="nombre" class="border border-gray-300 rounded-md p-2 mr-3 w-1/3" required>
                    </div>
                    <div>
                        <label for="apellido_paterno" class="block text-blanco font-medium mb-2">Apellido Paterno:</label>
                        <input maxlength="60" type="text" id="apellido_paterno" name="apellido_paterno" class="w-1/3 border border-gray-300 rounded-md p-2" required>
                    </div>
                  </div>
              </div> 
              <div class="flex flex-row">
                    <div>
                        <label for="apellido_materno" class="block text-blanco font-medium mb-2">Apellido Materno:</label>
                        <input maxlength="60" type="text" id="apellido_materno" name="apellido_materno" class="w-1/3 border border-gray-300 rounded-md p-2  mr-3" required>
                    </div>
                    <div class="mb-4 mr-3">
                        <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
                        <input type="text" id="numero_control" name="numero_control" class="w-1/3 border border-gray-300 rounded-md p-2" maxlength="8" required oninput="validarNumeros(this)">
                    </div>
              </div>
              <div class="flex flex-row">
              <div class="mb-4 mr-3">
                    <label for="nip" class="block text-blanco font-medium mb-2">NIP:</label>
                    <div class="flex flex-row items-center w-min">
                        <input type="password" id="nip" name="nip" maxlength="4" class="w-1/3 border border-gray-300 rounded-md p-2" required oninput="validarNumeros(this)">
                        <i id="bx" class="bx bx-hide text-3xl -mr-9" style="color:#f0803f;  cursor: pointer; transform: translateX(-30px);"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="confirmar_nip" class="block text-blanco font-medium mb-2">Confirmar NIP:</label>
                    <div class="flex flex-row items-center w-min">
                        <input type="password" id="confirmar_nip" maxlength="4" name="confirmar_nip" class="w-1/3 border border-gray-300 rounded-md p-2" required oninput="validarNumeros(this)">
                        <i id="bx2" class="bx bx-hide text-3xl -mr-9" style="color:#f0803f;  cursor: pointer; transform: translateX(-30px);"></i>
                    </div>
                </div>
              </div>
              <div class="flex flex-row">
                <div class="mb-6 mr-3">
                        <label for="correo_institucional" class="block text-blanco font-medium mb-2">Correo Institucional:</label>
                        <input type="text" id="correo_institucional" maxlength="60" name="correo_institucional" class="w-full border border-gray-300 rounded-md p-2" required oninput="validarCorreoInstitucional(this)">     
                </div>
                <div class="mb-6">
                        <label for="tipo_usuario" class="block text-blanco font-medium mb-2">Tipo de usuario:</label>
                        <select id="tipo_usuario" name="tipo_usuario" class=" w-1/3 border border-gray-300 rounded-md p-2" required>
                            <option value="EST" selected>Estudiante</option>
                            <option value="ADMIN">Administrador</option>
                            <option value="EMP">Emprendedor</option>
                        </select>
                </div>
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
