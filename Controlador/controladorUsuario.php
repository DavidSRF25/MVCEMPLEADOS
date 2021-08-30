<?php

require_once('Modelo/modeloUsuario.php');
require_once('Modelo/modeloEmpleado.php');
session_start();
$usu = $_SESSION['usuario'] ;
$ap = $_SESSION['apellido']; 
$of = $_SESSION['Oficio'] ;
$img = $_SESSION['foto'] ;
$doc = $_SESSION['doc'];

$prueba = "Hola Mundo usuario";

$usuario = new ModeloUsuario();
$empleado = new ModeloEmpleados();
$emple = $empleado->cargaSelect();



if (isset($_POST['consultar'])) {

  $cri = $doc;

  $datos = $usuario->Uno($doc);
}
if (isset($_POST['busca'])) {

  $cri = $_POST['criterio'];

  $datos = $usuario->Uno($cri);
}
if(isset($_POST['Actualizar'])){

  $cri=$_POST['criterio'];
  $datos=$usuario->Uno($cri);


}


if (isset($_POST['insertar'])) {

  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $foto = $_FILES['foto']['name'];
  $tipo = $_FILES['foto']['type'];
  $tamaño = $_FILES['foto']['size'];
  $password = $_POST['password'];

  $existe = $usuario->Uno($codigo);

  if ($existe) {

    echo "<script type='text/javascript'>alert('El usuario ya existe');</script>";
  } else {

    if ($foto != null) {

      if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg") {

        $hoy = date('dmy');
        $foto = $hoy . "_" . $codigo . "_" . $foto;
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/MVC/img/';
        $resultado = $usuario->InsertaUsuarios($codigo, $nombre, $foto, $password);
        if ($resultado > 0) {
          move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta . $foto);

          echo "<script type='text/javascript'>alert('El usuario se inserto correctamente');</script>";
        } else {

          echo "<script type='text/javascript'>alert('Error al insertar');</script>";
        }
      } else {
        echo "<script type='text/javascript'>alert('Formato no permitido');</script>";
        $resultado = $usuario->InsertaUsuarios($codigo, $nombre, "default.jpg", $password);
        if ($resultado > 0) {

          echo "<script type='text/javascript'>alert('El usuario se inserto correctamente pero sin foto');</script>";
        } else {
          echo "<script type='text/javascript'>alert('Error al insertar');</script>";
        }
      }
    } else {

      $resultado = $usuario->InsertaUsuarios($codigo, $nombre, "default.jpg", $password);
      if ($resultado > 0) {

        echo "<script type='text/javascript'>alert('El usuario se inserto correctamente ');</script>";
      } else {
        echo "<script type='text/javascript'>alert('Error al insertar');</script>";
      }
    }
  }
}

if (isset($_POST['actualiza'])) {

  $codigoa = $_POST['codigoa'];
  $nombrea = $_POST['nombrea'];
  $fotob=$_POST['fotob'];
  
  $fotoa = $_FILES['fotoa']['name'];
  $tipoa = $_FILES['fotoa']['type'];
  $tamañoa = $_FILES['fotoa']['size'];
  $passworda = $_POST['passworda'];



    if ($fotoa != null) {

      if ($tipoa == "image/gif" || $tipoa == "image/png" || $tipoa == "image/jpeg") {

        $hoy = date('dmy');
        $fotoa = $hoy . "_" . $codigoa . "_" . $fotoa;
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/MVC/img/';
        $resultado = $usuario->ActualizaUsuarios($codigoa, $nombrea, $fotoa, $passworda);
        if ($resultado > 0) {
          move_uploaded_file($_FILES['fotoa']['tmp_name'], $carpeta . $fotoa);

          echo "<script type='text/javascript'>alert('El usuario se actualizo correctamente 1');</script>";
        } else {

          echo "<script type='text/javascript'>alert('Error al actualizar');</script>";
        }
      } else {
        echo "<script type='text/javascript'>alert('Formato no permitido');</script>";
        $resultado = $usuario->ActualizaUsuarios($codigoa, $nombrea, "default.jpg", $passworda);
        if ($resultado > 0) {

          echo "<script type='text/javascript'>alert('El usuario se actualizo correctamente pero sin foto');</script>";
        } else {
          echo "<script type='text/javascript'>alert('Error al actualizar');</script>";
        }
      }
    } else {

      $resultado = $usuario->ActualizaUsuarios($codigoa, $nombrea, $fotob, $passworda);
      if ($resultado > 0) {

        echo "<script type='text/javascript'>alert('El usuario se  actualizo correctamente 2');</script>";
      } else {
        echo "<script type='text/javascript'>alert('Error al actualizar');</script>";
      }
    }
  }

  if(isset($_POST['borrar'])){
    $codigoU=$_POST['criterio']; 
  
    $resultado=$usuario->EliminarUsuario($codigoU);
    if($resultado > 0){
        echo "<script type='text/javascript'>alert('El usuario se ha eliminado correctamente');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Error  al  Eliminar el usuario);</script>";
    }
  }


require_once('Vista/vistaUsuario.php');
?>