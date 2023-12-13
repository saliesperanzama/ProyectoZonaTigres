<?php
    include('../includes/utilerias.php');
    include('../includes/sql.php');
    session_start();
    if(empty($_POST)){
        header('Location: ../index.php');
    }else{
        if (isset($_SESSION['usuario_tipo'])){
            if ($_SESSION['usuario_tipo'] != "ADMIN"){
                header('Location: ../index.php');
            }else{
                $nombre = $_POST['nombre'];
                $apellido_paterno = $_POST['apellido_paterno'];
                $apellido_materno = $_POST['apellido_materno'];
                $numero_control = $_POST['numero_control'];
                $nip = $_POST['nip'];
                $correo_institucional = $_POST['correo_institucional'];
                $tipo_usuario = $_POST['tipo_usuario'];

                $verificar_estudiante = "SELECT * FROM usuarios WHERE no_de_control = '$numero_control' AND correo_institucional = '$correo_institucional'";
                $res_verificar = ejecutar_sql($verificar_estudiante);
                $row = $res_verificar->fetch_assoc();
                $id_estudiante = $row['idusuarios'];
                if($res_verificar->num_rows!=0){
                    //VERIFICAR QUE SEA EMPRENDEDOR
                    $qry_emp = "SELECT * FROM emprendedor WHERE fk_idusuarios = '$id_estudiante'";
                    $res_emp = ejecutar_sql($qry_emp);
                    if($res_emp->num_rows!=0){
                        $qry_updt = "UPDATE usuarios 
                                SET nombre = '$nombre', 
                                apellido_paterno = '$apellido_paterno', 
                                apellido_materno = '$apellido_materno',
                                correo_institucional = '$correo_institucional',
                                nip = '$nip',
                                tipo_de_usuario = '$tipo_usuario'
                                WHERE idusuarios = '$id_estudiante'";
                        $res_updt = ejecutar_sql($qry_updt);
                        if($res_updt){
                            ?>
                                <script>
                                    alert('Usuario actualizado correctamente!');
                                    window.location.href = './usuarios.php';
                                </script>
                            <?php
                        }else{
                            ?>
                                <script>
                                    alert('No se pudo actualizar el usuario');
                                    window.location.href = './usuarios.php';
                                </script>
                            <?php
                        }
                    }else{
                        ?>
                            <script>
                                alert('El usuario debe subir su foto y telefono como emprendedor');
                                window.location.href = './usuarios.php';
                            </script>
                        <?php
                    }
                    
                }else{
                    ?>
                        <script>
                            alert('No se encontró al usuario');
                            window.location.href = './usuarios.php';
                        </script>
                    <?php
                }
                    }
                }else{
                    header('Location: ../index.php');
                }
     }
?>