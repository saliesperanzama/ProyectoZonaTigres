<?php
    include('../includes/utilerias.php');
    include('../includes/sql.php');
    if(empty($_POST)){
        redireccionar('Prohibido','index.php');
    }
     else{
         $numero_control = $_POST['numero_control'];
         $correo_institucional = $_POST['correo_institucional'];

         $verificar_estudiante = "SELECT * FROM estudiantes WHERE no_de_control = '$numero_control' AND correo_institucional = '$correo_institucional'";
         $res_verificar = ejecutar_sql($verificar_estudiante);

         if($res_verificar->num_rows!=0){
            ?>
                <script>
                    alert('El estudiante ya se encuentra registrado');
                    window.location.href = './estudiantes.php';
                </script>
            <?php
         }else{
            $registrar_estudiante = "INSERT INTO estudiantes(no_de_control, correo_institucional) VALUES('$numero_control', '$correo_institucional')";
            $res = ejecutar_sql($registrar_estudiante);
            if($res){
                ?>
                    <script>
                        alert('Estudiante registrado exitosamente');
                        window.location.href = './estudiantes.php';
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert('No se pudo registrar el estudiante');
                        window.location.href = './estudiantes.php';
                    </script>
                <?php
            }
         }
     }
?>