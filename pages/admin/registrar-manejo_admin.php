<?php
    include('../includes/utilerias.php');
    include('../includes/sql.php');
    if(empty($_POST)){
        redireccionar('Prohibido','index.php');
    }
     else{
         $nombre = $_POST['nombre'];
         $apellido_paterno = $_POST['apellido_paterno'];
         $apellido_materno = $_POST['apellido_materno'];
         $numero_control = $_POST['numero_control'];
         $nip = $_POST['nip'];
         $correo_institucional = $_POST['correo_institucional'];
         $tipo_usuario = $_POST['tipo_usuario'];

         $verificar_estudiante = "SELECT * FROM estudiantes WHERE no_de_control = '$numero_control' AND correo_institucional = '$correo_institucional'";
         $res_verificar = ejecutar_sql($verificar_estudiante);

         if($res_verificar->num_rows!=0){
            $row = $res_verificar->fetch_assoc();
            $id_estudiante = $row['idestudiantes'];
            
            //Verificar si no está registrado
            $verificar_usuario = "SELECT * FROM usuarios WHERE no_de_control = '$numero_control'";
            $res_verificaru = ejecutar_sql($verificar_usuario);
            if($res_verificaru->num_rows!=0){
                ?>
                    <script>
                        alert('El usuario ya se encuentra registrado');
                        window.location.href = './usuarios.php';
                    </script>
                <?php
            }else{
                $ins_qry = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, no_de_control, nip, correo_institucional, tipo_de_usuario, fk_idestudiantes) 
                        VALUES('$nombre', '$apellido_paterno', '$apellido_materno', '$numero_control', '$nip', '$correo_institucional', '$tipo_usuario', $id_estudiante)";
                $res_ins = ejecutar_sql($ins_qry);

            ?>
                <script>
                    alert('Usuario registrado correctamente!');
                    window.location.href = './usuarios.php';
                </script>
            <?php
            }
         }else{
            ?>
                <script>
                    alert('No se encontró al estudiante');
                    window.location.href = './usuarios.php';
                </script>
            <?php
         }
     }
?>