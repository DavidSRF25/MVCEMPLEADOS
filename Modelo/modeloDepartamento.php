<?php 

require_once('Conexion.php');

class ModeloDpto{

public function ConsultaTodos(){

try{

    $sql="select * from departamento;";
    $conecta=Conexion::conexionbd()->prepare($sql);
    $conecta->execute();
    
    while($fila=$conecta->fetch()){ // Recorre fila por fila 

      $departamento[]=$fila; // Se guarda en un arreglo 

    }


}catch(Exception $e){

   echo "Error en la consulta ".$e;

}
return $departamento; // Se retorna el arreglo 

}

public function Uno($criterio){
  $departamento =null;

  try {
    $sql_uno="select * from departamento where CODIGO_DEPART=? or NOMBRE=? or LOCALIDAD=?";
    $dpto =Conexion::conexionbd()->prepare($sql_uno);
    $dpto->bindParam(1,$criterio);
    $dpto->bindParam(2,$criterio);
    $dpto->bindParam(3,$criterio);
    $dpto->execute();

    while($f=$dpto->fetch()){

       $departamento[]=$f;

    }

  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }


 return $departamento;
}
public function Dos($criterio){
  $departamento =null;

  try {
    $sql_uno="select * from departamento where CODIGO_DEPART=?";
    $dpto =Conexion::conexionbd()->prepare($sql_uno);
    $dpto->bindParam(1,$criterio);
    
    $dpto->execute();

    while($f=$dpto->fetch()){

       $departamento[]=$f;

    }

  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }


 return $departamento;
}

public function Inner($criterio){
  $departamento =null;

  try {
    $sql_uno="select departamento from empleado  as e inner join  departamento as d on (e.departamento=d.CODIGO_DEPART) where departamento=?";
    $dpto =Conexion::conexionbd()->prepare($sql_uno);
    $dpto->bindParam(1,$criterio);
    
    $dpto->execute();

    while($f=$dpto->fetch()){

       $departamento[]=$f;

    }

  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }


 return $departamento;
}




public function cargaSelect(){
  $departamentos=null;

  try{

    $sql4="Select * from departamento";
    $conecta=Conexion::conexionbd()->prepare($sql4);
    $conecta->execute();
    
    while($fila=$conecta->fetch()){ // Recorre fila por fila 

      $departamento[]=$fila; // Se guarda en un arreglo 

    }


}catch(Exception $e){

   echo "Error en la consulta ".$e;

}
    return $departamento; // Se retorna el arreglo 

}


public function InsertaDepartamento($codigod,$nombred,$Localidad){

  $res=0;

  try {
    $sql_ins="insert into departamento value (?,?,?)";

    $ps=Conexion::conexionbd()->prepare($sql_ins);
    $ps->bindParam(1,$codigod);
    $ps->bindParam(2,$nombred);
    $ps->bindParam(3,$Localidad);
    if($ps->execute()){

        $res=1;


    }else{

      $res=0;
    }
  } catch (Exception $e) {
    echo "Error al insertar en la tabla dpto";
  }

     return $res;
}

public function ActualizaDepartamento($codigoda,$nombreda,$Localidada){

  $res=0;

  try {
    $sql_ins="update departamento set NOMBRE=?,LOCALIDAD=? where CODIGO_DEPART=? ";

    $ps=Conexion::conexionbd()->prepare($sql_ins);
    $ps->bindParam(3,$codigoda);
    $ps->bindParam(1,$nombreda);
    $ps->bindParam(2,$Localidada);
    if($ps->execute()){

        $res=1;


    }else{

      $res=0;
    }
  } catch (Exception $e) {
    echo "Error al Actualizar en la tabla dpto";
  }

     return $res;
}

public function EliminarDpto($codigoD){
  $res=0;
  
  try{


      $sql_eli1=" delete from departamento where CODIGO_DEPART=?";
      $sql_eli2=" delete from empleado where CODIGO_EMPLEADO=?";
      $ps=Conexion::conexionbd()->prepare($sql_eli1);
      $ps2=Conexion::conexionbd()->prepare($sql_eli2);
      $ps->bindParam(1, $codigoD);
      $ps2->bindParam(1,$codigoD);

      if($ps->execute() && $ps2->execute() ){
         $res=1;
      }else{
         $res=0; 
      }
    
         
}catch(Exception $e){
  echo "Error al eliminar";
}
return $res;
}

}
