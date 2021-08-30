<?php 

require_once('Conexion.php');

class ModeloEmpleados{

public function ConsultaTodos(){

try{

    $sql="select  e.Codigo_Empleado , e.Apellido,e.Oficio ,e.Direccion,e.Fecha_Ingreso,e.Salario,e.Comision , d.nombre from empleado as e  inner join departamento as d on (e.departamento=d.CODIGO_DEPART);" ;
    $conecta=Conexion::conexionbd()->prepare($sql);
    $conecta->execute();
    
    while($fila=$conecta->fetch()){ // Recorre fila por fila 

      $empleados[]=$fila; // Se guarda en un arreglo 

    }


}catch(Exception $e){

   echo "Error en la consulta ".$e;

}
return $empleados; // Se retorna el arreglo 

}
public function ConsultaTodosEmple($criterio){
  $empleados=null;

  try{
  
      $sql="select  e.Codigo_Empleado , e.Apellido,e.Oficio ,e.Direccion,e.Fecha_Ingreso,e.Salario,e.Comision , d.nombre from empleado as e  inner join departamento as d on (e.departamento=d.CODIGO_DEPART) where OFICIO=?;" ;
      $conecta=Conexion::conexionbd()->prepare($sql);
      
      $conecta->bindParam(1,$criterio);
      $conecta->execute();
      
      while($fila=$conecta->fetch()){ // Recorre fila por fila 
  
        $empleados[]=$fila; // Se guarda en un arreglo 
  
      }
  
  
  }catch(Exception $e){
  
     echo "Error en la consulta ".$e;
  
  }
  return $empleados; // Se retorna el arreglo 
  
  }
public function Uno($criterio){

  $empleados=null;
  try{
    
    $sql_uno="select  e.Codigo_Empleado , e.Apellido,e.Oficio ,e.Direccion,e.Fecha_Ingreso,e.Salario,e.Comision , d.nombre,d.CODIGO_DEPART from empleado as e  inner join departamento as d on (e.departamento=d.CODIGO_DEPART) where CODIGO_EMPLEADO=? or APELLIDO=? or OFICIO=?  or DIRECCION=? or  d.nombre=? or FECHA_INGRESO=?";
    
    
    $emple=Conexion::conexionbd()->prepare($sql_uno);
    $row=$sql_uno;
    $date = date_create($row[6]);
    $final=date_format($date, 'd-m-y');
    
 
    $emple->bindParam(1,$criterio);
    $emple->bindParam(2,$criterio);
    $emple->bindParam(3,$criterio);
    $emple->bindParam(4,$criterio);
    $emple->bindParam(5,$criterio);
    $emple->bindParam(6,$final);

    
    
    $emple->execute();
    

    while($f=$emple->fetch()){
       
       
       $empleados[]=$f;
       



    }

  



  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }

 

  return $empleados; 
 

}

public function Dos($criterio){

  $empleados=null;
  try{
    
    $sql_uno="select  e.Codigo_Empleado , e.Apellido,e.Oficio ,e.Direccion,e.Fecha_Ingreso,e.Salario,e.Comision , d.nombre,d.CODIGO_DEPART from empleado as e  inner join departamento as d on (e.departamento=d.CODIGO_DEPART) where CODIGO_EMPLEADO=?";
    
    
    $emple=Conexion::conexionbd()->prepare($sql_uno);
    $row=$sql_uno;
   
    
 
    $emple->bindParam(1,$criterio);
   

    
    
    $emple->execute();
    

    while($f=$emple->fetch()){
       
       
       $empleados[]=$f;
       



    }

  



  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }

 

  return $empleados; 
 

}

public function Fecha($criterio){

  $empleados=null;
  try{
    
    $sql_uno="select  e.Codigo_Empleado , e.Apellido,e.Oficio ,e.Direccion,e.Fecha_Ingreso,e.Salario,e.Comision , d.nombre ,d.CODIGO_DEPART from empleado as e  inner join departamento as d on (e.departamento=d.CODIGO_DEPART) where FECHA_INGRESO=?";
    
    
    $emple=Conexion::conexionbd()->prepare($sql_uno);
 
    $emple->bindParam(1,$criterio);
    
    
    $emple->execute();
    

    while($f=$emple->fetch()){
       
       
       $empleados[]=$f;



    }

  



  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }

 

  return $empleados; 
 


}


public function cargaSelect(){
  $empleados=null;

  try{

    $sql4="select * from empleado left join Usuario  on (empleado.CODIGO_EMPLEADO=Usuario.cod_usuario)where  usuario.cod_usuario is null;";
    $conecta=Conexion::conexionbd()->prepare($sql4);
    $conecta->execute();
    
    while($fila=$conecta->fetch()){ // Recorre fila por fila 

      $empleados[]=$fila; // Se guarda en un arreglo 

    }


}catch(Exception $e){

   echo "Error en la consulta ".$e;

}
    return $empleados; // Se retorna el arreglo 

}

public static function InsertaEmpleado($codigo,$apellido,$oficio,$direccion,$fechaingreso,$Salario,$comision,$departamento){

$res=0;

try {
  
  $sql_ins="insert into empleado value (?,?,?,?,?,?,?,?)";
  $ps=Conexion::conexionbd()->prepare($sql_ins);

  $ps->bindParam(1,$codigo);
  $ps->bindParam(2,$apellido);
  $ps->bindParam(3,$oficio);
  $ps->bindParam(4,$direccion);
  $ps->bindParam(5,$fechaingreso);
  $ps->bindParam(6,$Salario);
  $ps->bindParam(7,$comision);
  $ps->bindParam(8,$departamento);

    if($ps->execute()){

      $res=1;

    }else{

      $res=0;

    }

} catch (Exception $e) {
  echo $e;
}

  return $res;
}

public function ActualizarEmpleado($codigoa,$apellidoa,$oficioa,$direcciona,$fechaingresoa,$Salarioa,$comisiona,$departamentoa){

  $res=0;
  
  try {
    
    $sql_ins="update empleado  set APELLIDO=?,OFICIO=?,DIRECCION=?,FECHA_INGRESO=?,SALARIO=?,COMISION=?,departamento=? where CODIGO_EMPLEADO=?";
    $ps=Conexion::conexionbd()->prepare($sql_ins);
  
    $ps->bindParam(8,$codigoa);
    $ps->bindParam(1,$apellidoa);
    $ps->bindParam(2,$oficioa);
    $ps->bindParam(3,$direcciona);
    $ps->bindParam(4,$fechaingresoa);
    $ps->bindParam(5,$Salarioa);
    $ps->bindParam(6,$comisiona);
    $ps->bindParam(7,$departamentoa);
  
      if($ps->execute()){
  
        $res=1;
  
      }else{
  
        $res=0;
  
      }
  
  } catch (Exception $e) {
    echo "Error al actualizar";
  }
  
    return $res;
  }
  public function EliminarEmpleado($codigoEm){
    $res=0;
    try{
        $sql_eli1=" delete from usuario where cod_usuario =?";
        $sql_eli2=" delete from empleado where CODIGO_EMPLEADO=?";
        $ps=Conexion::conexionbd()->prepare($sql_eli1);
        $ps2=Conexion::conexionbd()->prepare($sql_eli2);
        $ps->bindParam(1, $codigoEm);
        $ps2->bindParam(1,$codigoEm);
  
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
