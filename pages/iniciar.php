<?php
    include('includes/encabezado.php');
	session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }
    }
?>
	<script src="includes/js/iniciar.js"></script>
        <section class="flex items-center justify-center h-full">
				<div class="bg-negro p-8 rounded-lg shadow-lg bg-opacity-40 w-1/4">
				  <h1 class="text-2xl font-semibold text-blanco mb-4 text-center">Iniciar Sesión</h1>
				  <form action="iniciar-manejo.php" method="post">
					  <div class="mb-4">
						  <label for="numero_control" class="block text-blanco font-medium mb-2">Número de Control:</label>
						  <input type="text" id="numero_control" name="numero_control" class="w-full border border-gray-300 rounded-md p-2" maxlength="8" required oninput="validarNumeros(this)">
					  </div>
					  <div class="mb-4">
						  <label for="nip_iniciar" class="block text-blanco font-medium mb-2">NIP:</label>
						  <div class="flex flex-row items-center w-min">
								<input type="password" id="nip_iniciar" name="nip_iniciar" maxlength="4" class="w-full border border-gray-300 rounded-md p-2" required oninput="validarNumeros(this)">
								<i id="bx3" class="bx bx-hide text-3xl -mr-9" style="color:#f0803f;  cursor: pointer; transform: translateX(-30px);"></i>
						  </div>
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