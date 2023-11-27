<?php 
function consultaPrueba($id) {
    try {
        // 1. Importar las credenciales
        require "conexion.php";

        // 2. Realizar la consulta
        $query = "SELECT * FROM prueba WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultados = $stmt->get_result();

        // 3. Manejar los resultados
        $filas = $resultados->fetch_all(MYSQLI_ASSOC);

        // 4. Cerrar la declaración y la conexión
        $stmt->close();
        mysqli_close($conexion);

        return $filas;
    } catch (\Throwable $th) {
        // Manejar cualquier excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
        echo "Error en la consulta: " . $th->getMessage();
        return false; // Puedes devolver un valor específico en caso de error si es necesario
    }
}

function registraPrueba($mensaje) {
    try {
        // 1. Importar las credenciales
        require "conexion.php";

        // 2. La consulta SQL con los marcadores de posición ?
        $query = "INSERT INTO prueba (mensaje) 
                  VALUES (?)";

        // 3. Preparar la consulta
        $stmt = $conexion->prepare($query);

        // 4. Vincular los parámetros
        $stmt->bind_param("s", $mensaje);

        // 5. Ejecutar la consulta
        $resultado = $stmt->execute();

        // 6. Verificar si la consulta fue exitosa
        if ($resultado) {
            // Registro exitoso
            $stmt->close();
            mysqli_close($conexion);
            return true;
        } else {
            // Error al registrar
            $stmt->close();
            mysqli_close($conexion);
            return false;
        }

    } catch (\Throwable $th) {
        var_dump($th);
        return false;
    }
}

function editaPrueba($id, $nuevoMensaje) {
    try {
        // 1. Importar las credenciales
        require "conexion.php";

        // 2. La consulta SQL con los marcadores de posición ?
        $query = "UPDATE prueba SET mensaje = ? WHERE id = ?";

        // 3. Preparar la consulta
        $stmt = $conexion->prepare($query);

        // 4. Vincular los parámetros
        $stmt->bind_param("si", $nuevoMensaje, $id);

        // 5. Ejecutar la consulta
        $resultado = $stmt->execute();

        // 6. Verificar si la consulta fue exitosa
        if ($resultado) {
            // Edición exitosa
            $stmt->close();
            mysqli_close($conexion);
            return true;
        } else {
            // Error al editar
            $stmt->close();
            mysqli_close($conexion);
            return false;
        }

    } catch (\Throwable $th) {
        var_dump($th);
        return false;
    }
}

function eliminaPrueba($id) {
    try {
        // 1. Importar las credenciales
        require "conexion.php";

        // 2. La consulta SQL con los marcadores de posición ?
        $query = "DELETE FROM prueba WHERE id = ?";

        // 3. Preparar la consulta
        $stmt = $conexion->prepare($query);

        // 4. Vincular los parámetros
        $stmt->bind_param("i", $id);

        // 5. Ejecutar la consulta
        $resultado = $stmt->execute();

        // 6. Verificar si la consulta fue exitosa
        if ($resultado) {
            // Eliminación exitosa
            $stmt->close();
            mysqli_close($conexion);
            return true;
        } else {
            // Error al eliminar
            $stmt->close();
            mysqli_close($conexion);
            return false;
        }

    } catch (\Throwable $th) {
        var_dump($th);
        return false;
    }
}
?>