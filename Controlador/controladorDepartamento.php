<?php

require_once('Modelo/modeloDepartamento.php');
session_start();
$usu = $_SESSION['usuario'] ;
$ap = $_SESSION['apellido']; 
$of = $_SESSION['Oficio'] ;
$img = $_SESSION['foto'] ;
$doc = $_SESSION['doc'];

$prueba="Hola Mundo usuario";

$Dpto=new ModeloDpto();


if(isset($_POST['consultar'])){

    $datos=$Dpto->ConsultaTodos();


}
if(isset($_POST['busca'])){

    $cri=$_POST['criterio'];

    $datos=$Dpto->Uno($cri);

}


if(isset($_POST['insertar'])){


$codigo=$_POST['codigoD'];
$nombre=$_POST['nombreD'];
$localidad=$_POST['Localidad'];

$existe=$Dpto->Uno($codigo);


if($existe){
  
    echo "<script type='text/javascript'>alert('El departamento ya existe');</script>";

}else{

    $resultado=$Dpto->InsertaDepartamento($codigo,$nombre,$localidad);

    if($resultado>0){
        echo "<script type='text/javascript'>alert('El departamento se inserto correctamente');</script>";
 

    }else{


        echo "<script type='text/javascript'>alert('Error al insertar');</script>"; 


    }
}
}
if(isset($_POST['Actualizar'])){

    $cri=$_POST['criterio'];
    $datos=$Dpto->Dos($cri);
  
  
  }

  if(isset($_POST['actualiza'])){


    $codigoa=$_POST['codigoDa'];
    $nombrea=$_POST['nombreDa'];
    $localidada=$_POST['Localidada'];
    
    
    
    
    
    
        $resultado=$Dpto->ActualizaDepartamento($codigoa,$nombrea,$localidada);
    
        if($resultado>0){
            echo "<script type='text/javascript'>alert('El departamento se actualizo correctamente');</script>";
     
    
        }else{
    
    
            echo "<script type='text/javascript'>alert('Error al actualizar');</script>"; 
    
    
        }
    }
    
    if(isset($_POST['borrar'])){
        $codigoD=$_POST['criterio']; 
        $existe=$Dpto->Inner($codigoD);

        
    
        
  
        if($existe){
  
            echo "<script type='text/javascript'>alert('El departamento no se puede eliminar por que esta asociado a un empleado');</script>";
        
        }else{
        
        $resultado=$Dpto->EliminarDpto($codigoD);

        if($resultado > 0){
            echo "<script type='text/javascript'>alert('El departamento se ha eliminado correctamente');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Error  al  Eliminar el departamento);</script>";
        }
      }
    }
    

require_once('Vista/vistaDepartamento.php');

?>