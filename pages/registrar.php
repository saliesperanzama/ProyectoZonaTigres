<?php
    include('includes/encabezado.php');
?>
        <section class="flex items-center justify-center h-full">
        <div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/4">
          <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Registro de Usuario</h1>
          <form action="#" method="post">
              <div class="mb-4">
                  <label for="nombre" class="block text-blanco font-medium mb-2">Nombre:</label>
                  <input type="text" id="nombre" name="nombre" class="w-full border border-gray-300 rounded-md p-2" required>
              </div>
              <div class="mb-4">
                  <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
                  <input type="text" id="numero_control" name="numero_control" class="w-full border border-gray-300 rounded-md p-2" required>
              </div>
              <div class="mb-4">
                  <label for="nip" class="block text-blanco font-medium mb-2">NIP:</label>
                  <input type="password" id="nip" name="nip" class="w-full border border-gray-300 rounded-md p-2" required>
              </div>
              <div class="mb-6">
                  <label for="confirmar_nip" class="block text-blanco font-medium mb-2">Confirmar NIP:</label>
                  <input type="password" id="confirmar_nip" name="confirmar_nip" class="w-full border border-gray-300 rounded-md p-2" required>
              </div>
              <div class="text-center">
                  <button id="registrar" type="submit" class="bg-naranjam text-blanco font-semibold text-lg py-2 px-4 rounded-md hover:bg-naranja">Registrar</button>
                  <script>
                    document.getElementById('registrar').addEventListener('click', function() {
                        alert('Te has registrado correctamente');
                        window.location.href = './iniciar.php';
                        return false;                          
                    });
                </script>
              </div>
          </form>
      </div>
      </section>
    </main>
<?php
    include('includes/pie.php');
?>