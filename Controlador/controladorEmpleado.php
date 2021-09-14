
<?php

require_once('Modelo/modeloEmpleado.php');
require_once('Modelo/modeloDepartamento.php');
require_once('fpdf/reporteEmpleados.php');


session_start();
$usu = $_SESSION['usuario'] ;
$ap = $_SESSION['apellido']; 
$of = $_SESSION['Oficio'] ;
$img = $_SESSION['foto'] ;
$doc = $_SESSION['doc'];

$prueba = "Hola Mundo usuario";

$empleado = new ModeloEmpleados();
$departamentitos = new ModeloDpto();
$dp = $departamentitos->cargaSelect();



if (isset($_POST['consultar'])) {

  $datos = $empleado->ConsultaTodos();
}

if (isset($_POST['busca'])) {

  $cri = $_POST['criterio'];

  $datos = $empleado->Uno($cri);
}

if (isset($_POST['pdf'])) {
$pdf = new PDF();


  $datos = $empleado->ConsultaTodosPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('P','Letter');
  $pdf->SetFont('Times','',12);

  foreach($datos as $f ){
    
        $pdf->Ln();
        $pdf->Cell(20,10,$f[0],1,0,'C',0);
        $pdf->Cell(27,10,utf8_decode($f[1]),1,0,'C',0);
        $pdf->Cell(30,10,$f[2],1,0,'C',0);
        $pdf->Cell(20,10,$f[3],1,0,'C',0);
        $pdf->Cell(30,10,$f[4],1,0,'C',0);
        $pdf->Cell(20,10,$f[5],1,0,'C',0);
        $pdf->Cell(20,10,$f[6],1,0,'C',0);
        $pdf->Cell(35,10,$f[7],1,0,'C',0);



  }

  
  $hoy = date('dmy');
        $nombre = $hoy . "_Listado_Empleados.pdf" ;
  $pdf->Output('D',$nombre);// GEnera el PDF



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


require_once('Vista/vistaEmpleado.php');
?>