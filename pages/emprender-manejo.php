<?php
    include('includes/utilerias.php');
    include('includes/sql.php');
    session_start();
    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == "ADMIN"){
            header('Location: administrar.php');
        }else{
            if(empty($_POST)){
                redireccionar('Prohibido','index.php');
            }
            else{
                // $imagen = $_POST['imagen'];
                $telefono = $_POST['telefono'];
                $idusuario = $_SESSION['usuario_id'];
                //VERIFICAR SI ESTÁS REGISTRADO
                $consulta_verificar = "SELECT * FROM usuarios WHERE idusuarios = '$idusuario'";
                $res = ejecutar_sql($consulta_verificar);
                
                if($res->num_rows > 0){
                    $verificar_empr = "SELECT * FROM emprendedor WHERE fk_idusuarios = '$idusuario'";
                    $res_empr = ejecutar_sql($verificar_empr);
                    if($res_empr->num_rows > 0){
                        ?>
                        <script>
                            alert('Ya estas registrado como emprendedor!');
                            window.location.href = '../pages/datos_producto.php';
                        </script>
                        <?php
                    }else{
                    $imagen = subir_imagen($_FILES['foto']);
                    $ins_emprendedor = "INSERT INTO emprendedor (telefono,img_personal,fk_idusuarios) 
                                        VALUES ('$telefono','$imagen','$idusuario')";
                    $res_ins = ejecutar_sql($ins_emprendedor);
                    if($res_ins){
                        $upt_usuario = "UPDATE usuarios SET tipo_de_usuario = 'EMP' WHERE idusuarios = '$idusuario'";
                        $res_upt = ejecutar_sql($upt_usuario);
                        if($res_upt){
                            ?>
                                <script>
                                    alert('Emprendedor registrado!');
                                    window.location.href = '../pages/datos_producto.php';
                                </script>
                            <?php
                        }
                        
                    }else{
                        ?>
                            <script>
                                alert('Error al registrar emprendedor');
                                window.location.href = '../pages/productos.php';
                            </script>
                        <?php
                    }
                    }
                    
                }else{
                    ?>
                        <script>
                            alert('Error');
                            window.location.href = '../pages/index.php';
                        </script>
                    <?php
                }
            }
        }
    }else{
        header('Location: index.php');
    }
?>