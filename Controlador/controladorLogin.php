<?php 

require_once('Modelo/modeloUsuario.php');

$logeo = new ModeloUsuario();

if (isset($_POST['ingresar'])) {

    $nombre = $_POST['usu'];
    $password = $_POST['pass'];
    $usu=$logeo->Login($nombre,$password);


    if(count($usu)>0){

        foreach($usu as $f){

        session_start();//Iniciamos session
        $_SESSION['usuario']=$f[1];
        $_SESSION['apellido']=$f[5];
        $_SESSION['Oficio']=$f[6];
        $_SESSION['foto']=$f[2];
        $_SESSION['doc']=$f[0];
        header('Location:'.$f[6].'.php');
        }
    }else{

        echo '<script type="text/javascript">alert("Datos Incorrectos");self.location=login.php</script>';




    }










}


if(isset($_POST['cerrar'])){


session_start();//Iniciamos session
if($_SESSION){

session_destroy();
echo '<script type="text/javascript">alert("Cerrando Sesion....");self.location="login.php";</script>';



}else{
    echo '<script type="text/javascript">alert("Usuario no autenticado....");self.location="login.php";</script>';


}




}


















require_once('Vista/vistaLogin.php');




?>