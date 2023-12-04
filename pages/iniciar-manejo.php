<?php
    include('includes/utilerias.php');
    include('includes/sql.php');
    session_start();
    if(empty($_POST)){
        redireccionar('Prohibido','index.php');
    }
    else{
        $numero_control = $_POST['numero_control'];
        $nip = $_POST['nip_iniciar'];
        //VERIFICAR SI ESTA REGISTRADO
        $verificar_estudiante = "SELECT * FROM usuarios WHERE no_de_control = '$numero_control'";
        $res_verificar = ejecutar_sql($verificar_estudiante);
        
        if($res_verificar->num_rows!=0){
            $row = $res_verificar->fetch_assoc();
            $no_de_control = $row['no_de_control'];
            $nip2 = $row['nip'];
            $tipo_usuario = $row['tipo_de_usuario'];
            $nombre = $row['nombre'];
            //VERIFICAR QUE COINCIDAN LAS CREDENCIALES
            if($numero_control == $no_de_control && $nip == $nip2 ){
                // Guardar información en la sesión
                    $_SESSION['usuario_id'] = $row['idusuarios'];
                if($tipo_usuario == "ADMIN"){
                    redireccionar('Bienvenido(a) Administrador ' . $nombre,'administrar.php');
                }else{
                    redireccionar('Bienvenido(a) ' . $nombre,'productos.php');
                }
            }
            else{
                ?>
                <script>
                    alert('Las credenciales no coinciden');
                    window.location.href = '../pages/iniciar.php';
                </script>
            <?php
            }
        }else{
            ?>
                <script>
                    alert('Usuario no encontrado, favor de registrarse');
                    window.location.href = '../pages/registrar.php';
                </script>
            <?php
        }
    }
    
?>