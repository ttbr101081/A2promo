<?php

    require 'conexion.php';

    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    if($_POST['n_empresa'] != null){
        $n_empresa= $_POST['n_empresa'];
    }else{
        $n_empresa= 'sin_empresa';
    }
    $c_prin= $_POST['c_prin'];
    $c_secu= $_POST['c_secu'];
    $ciudad= $_POST['ciudad'];
    $provincia= $_POST['provincia'];
    $telefono= $_POST['telefono'];
    $correo= $_POST['correo'];
    
    $sql = "insert into cliente values('$nombre', '$apellido', '$n_empresa', '$c_prin', '$c_secu', '$ciudad', '$provincia', '$telefono', '$correo')";

    if($connect->query($sql) === TRUE) {	
       echo '<script language="javascript">alert("La cotización se realizo correctamente");window.location.href="https://localhost/A2promo/index.html"</script>';
   } else {
        echo '<script language="javascript">alert("Ocurrio un error durante el proceso");window.location.href="https://localhost/A2promo/checkout.html"</script>';
   }

   $connect->close();
?>
