<?php 
    include ('../includes/sql.php');
    $idusuario = $_GET['id'];
    $consulta = "SELECT * FROM estudiantes WHERE idestudiantes = $idusuario";
    $res = ejecutar_sql($consulta);
    $row = $res->fetch_assoc();
    $no_de_control = $row['no_de_control'];
    $correo_institucional = $row['correo_institucional'];
    $consulta2 = "SELECT * FROM usuarios WHERE no_de_control = '$no_de_control' AND correo_institucional = '$correo_institucional'";
    $res2 = ejecutar_sql($consulta2);

    if($res2->num_rows == 0) {
        if ($row) {
            $qry_delete = "DELETE FROM estudiantes WHERE idestudiantes = $idusuario";
            $res_delete = ejecutar_sql($qry_delete);
            if ($res_delete) {
                ?>
                <script>
                    alert('Estudiante eliminado correctamente!');
                    window.location.href = './estudiantes.php';
                </script>
            <?php
            }
        }
    }else{
        ?>
            <script>
                alert('No se pudo eliminar el estudiante ya que se encuentra registrado como usuario');
                window.location.href = './estudiantes.php';
            </script>
        <?php
    }
    
?>