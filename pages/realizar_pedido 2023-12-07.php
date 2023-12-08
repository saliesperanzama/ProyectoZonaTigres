<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pedido</title>
    <!-- Enlace a Tailwind CSS (reemplaza con la URL de tu propio archivo de estilo) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Crear Pedido</h2>

    <form action="procesar_pedido.php" method="post">
        <div class="mb-4">
            <label for="producto" class="block text-gray-600 font-medium">Producto:</label>
            <input type="text" id="producto" name="producto" class="w-full border rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="fecha_entrega" class="block text-gray-600 font-medium">Fecha de entrega:</label>
            <input type="date" id="fecha_entrega" name="fecha_entrega" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+3 days')) ?>" class="w-full border rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="precio" class="block text-gray-600 font-medium">Precio por unidad:</label>
            <input type="number" id="precio" name="precio" min="0.01" step="0.01" class="w-full border rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="cantidad" class="block text-gray-600 font-medium">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" class="w-full border rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="total" class="block text-gray-600 font-medium">Total:</label>
            <input type="text" id="total" name="total" class="w-full border rounded-md p-2" readonly>
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Crear Pedido</button>
    </form>
</div>

<script>
    // Calcular el total al cambiar el precio o la cantidad
    document.getElementById('precio').addEventListener('input', calcularTotal);
    document.getElementById('cantidad').addEventListener('input', calcularTotal);

    function calcularTotal() {
        const precio = parseFloat(document.getElementById('precio').value);
        const cantidad = parseInt(document.getElementById('cantidad').value);
        const total = isNaN(precio) || isNaN(cantidad) ? 0 : (precio * cantidad).toFixed(2);
        document.getElementById('total').value = total;
    }
</script>
</body>
</html>
