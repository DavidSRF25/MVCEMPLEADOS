<?php

require_once('Modelo/modeloEmpleado.php');
require_once('Modelo/modeloDepartamento.php');
require_once('Modelo/modeloUsuario.php');
session_start();
$usu = $_SESSION['usuario'] ;
$ap = $_SESSION['apellido']; 
$of = $_SESSION['Oficio'] ;
$img = $_SESSION['foto'] ;
$doc = $_SESSION['doc'];

$prueba = "Hola Mundo usuario";

$empleado = new ModeloEmpleados();
$usuario = new ModeloUsuario();
$departamentitos = new ModeloDpto();
$dp = $departamentitos->cargaSelect();


if (isset($_POST['consultar'])) {
    $cri = $doc;

    $datos = $empleado->Uno($cri);
    
}
if (isset($_POST['busca'])) {

  $cri = $doc;

  $datos = $empleado->Uno($cri);
}
if (isset($_POST['buscaf'])) {

  $cri = $_POST['criterio'];

  $datos = $empleado->Fecha($cri);
}

if (isset($_POST['Actualizar'])) {

  $cri = $_POST['criterio'];
  $datos = $empleado->Dos($cri);
}

if (isset($_POST['insertar'])) {
  if($of!="Empleado"){
    echo "<script type='text/javascript'>alert('Solo puede insertar nuevos empleados  una persona encargada ');</script>";

  }else{

  $codigo = $_POST['codigoE'];
  $apellido = $_POST['apellido'];
  $opciones = $_POST['opciones'];
  $direccion = $_POST['direccion'];
  $fecha = $_POST['fecha'];
  $salario = $_POST['salario'];
  $comision = $_POST['comision'];
  $departamentitos = $_POST['departamentos'];

  $existe = $empleado->Uno($codigo);

  if ($existe) {

    echo "<script type='text/javascript'>alert('El empleado ya existe');</script>";
  } else {

    $resultado = $empleado->InsertaEmpleado($codigo, $apellido, $opciones, $direccion, $fecha, $salario, $comision, $departamentitos);

    if ($resultado > 0) {

      echo "<script type='text/javascript'>alert('El empleado se inserto correctamente');</script>";
    } else {

      echo "<script type='text/javascript'>alert('Error al insertar');</script>";
    }
  }
}
}

if (isset($_POST['actualiza'])) {

  $codigoa = $_POST['codigoEa'];
  $apellidoa = $_POST['apellidoa'];
  $opcionesa = $_POST['opcionesa'];
  $direcciona = $_POST['direcciona'];
  $fechaa = $_POST['fechaa'];
  $salarioa = $_POST['salarioa'];
  $comisiona = $_POST['comisiona'];
  $departamentitosa = $_POST['departamentosa'];



  $resultado = $empleado->ActualizarEmpleado($codigoa, $apellidoa, $opcionesa, $direcciona, $fechaa, $salarioa, $comisiona, $departamentitosa);

  if ($resultado > 0) {

    echo "<script type='text/javascript'>alert('El empleado se actualizo correctamente');</script>";
  } else {

    echo "<script type='text/javascript'>alert('Error al actualizar');</script>";
  }
}

if (isset($_POST['borrar'])) {
  $codigoEm = $_POST['criterio'];

  $resultado = $empleado->EliminarEmpleado($codigoEm);
  if ($resultado > 0) {
    echo "<script type='text/javascript'>alert('El empleado se ha eliminado correctamente');</script>";
  } else {
    echo "<script type='text/javascript'>alert('Error  al  Eliminar el empleado');</script>";
  }
}


require_once('Vista/vistaVendedor.php');

