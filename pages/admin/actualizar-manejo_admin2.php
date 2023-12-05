<?php
    include('../includes/utilerias.php');
    include('../includes/sql.php');
    session_start();
    if(empty($_POST)){
        header('Location: ../index.php');
    }
     else{
         if (isset($_SESSION['usuario.tipo'])){
             if ($_SESSION['usuario.tipo'] != "ADMIN"){
                 header('Location: ../index.php');
             }else{
                $numero_control = $_POST['numero_control'];
                $correo_institucional = $_POST['correo_institucional'];
                $idestudiante = $_POST['idestudiante'];
                $verificar_estudiante = "SELECT * FROM estudiantes WHERE idestudiantes = '$idestudiante'";
                $res_verificar = ejecutar_sql($verificar_estudiante);
                $row = $res_verificar->fetch_assoc();
                $id_estudiante = $row['idestudiantes'];
                if($res_verificar->num_rows!=0){
                    $qry_updt = "UPDATE estudiantes 
                                SET no_de_control = '$numero_control',
                                correo_institucional = '$correo_institucional'
                                WHERE idestudiantes = '$id_estudiante'";
                    $res_updt = ejecutar_sql($qry_updt);
                    if($res_updt){
                        ?>
                            <script>
                                alert('Estudiante actualizado correctamente!');
                                window.location.href = './estudiantes.php';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script>
                                alert('No se pudo actualizar el estudiante');
                                window.location.href = './estudiantes.php';
                            </script>
                        <?php
                    }
                }else{
                    ?>
                        <script>
                            alert('No se encontró al estudiante');
                            window.location.href = './estudiantes.php';
                        </script>
                    <?php
                }
             }
         } 
     }
?>