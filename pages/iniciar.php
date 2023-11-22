<?php
    include('includes/encabezado.php');
?>
        <section class="flex items-center justify-center h-full">
				<div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/4">
				  <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Iniciar Sesión</h1>
				  <form action="iniciar-manejo.php" method="post">
					  <div class="mb-4">
						  <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
						  <input type="text" id="numero_control" name="numero_control" class="w-full border border-gray-300 rounded-md p-2" required>
					  </div>
					  <div class="mb-4">
						  <label for="nip" class="block text-blanco font-medium mb-2">NIP:</label>
						  <input type="password" id="nip" name="nip" class="w-full border border-gray-300 rounded-md p-2" required>
					  </div>
					  <div class="text-center">
						  <input value="Iniciar Sesión" id="iniciarSesion" type="submit" class="bg-naranjam text-blanco text-lg py-2 px-4 rounded-md hover:bg-naranja">
					  </div>
				  </form>
			  </div>
		</section>
    </main>
<?php
    include('includes/pie.php');
?>