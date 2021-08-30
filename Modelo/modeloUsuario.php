<?php 

require_once('Conexion.php');

class ModeloUsuario{

public function ConsultaTodos(){

try{

    $sql="select * from Usuario;";
    $conecta=Conexion::conexionbd()->prepare($sql);
    $conecta->execute();
    
    while($fila=$conecta->fetch()){ // Recorre fila por fila 

      $usuarios[]=$fila; // Se guarda en un arreglo 

    }


}catch(Exception $e){

   echo "Error en la consulta ".$e;

}
return $usuarios; // Se retorna el arreglo 

}


public function Uno($criterio){

  $usuarios=null;
  try{
    
    $sql_uno="select * from usuario where cod_usuario=? or nombre=?";
    $usu=Conexion::conexionbd()->prepare($sql_uno);
    $usu->bindParam(1,$criterio);
    $usu->bindParam(2,$criterio);
    $usu->execute();

    while($f=$usu->fetch()){
       
       
       $usuarios[]=$f;



    }
   
  }catch(Exception $e){
  
    echo "Error en la consulta ".$e;

  }

 

  return $usuarios; 
 

}





public function InsertaUsuarios($cod,$nom,$foto,$pass){

  $res=0;


  try {
    
    $sql_ins="insert into usuario  value(?,?,?,?)";

    $ps=Conexion::conexionbd()->prepare($sql_ins);
    $ps->bindParam(1,$cod);
    $ps->bindParam(2,$nom);
    $ps->bindParam(3,$foto);
    $ps->bindParam(4,$pass);

    if($ps->execute()){
    
      $res=1;


    }else{

      $res=0;
    }

  } catch (Exception $e) {
    echo "Error al insertar";
  }

  return $res;
  
}

public function ActualizaUsuarios($codigoa,$nombrea,$fotoa,$passworda){

  $res=0;


  try {
    
    $sql_ins="update usuario set nombre=? ,foto=?,password=? where cod_usuario=?";

    $ps=Conexion::conexionbd()->prepare($sql_ins);
    $ps->bindParam(4,$codigoa);
    $ps->bindParam(1,$nombrea);
    $ps->bindParam(2,$fotoa);
    $ps->bindParam(3,$passworda);

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

public function EliminarUsuario($codigoU){
  $res=0;
  try{
      $sql_eli1=" delete from usuario where cod_usuario =?";
      $sql_eli2=" delete from empleado where CODIGO_EMPLEADO=?";
      $ps=Conexion::conexionbd()->prepare($sql_eli1);
      $ps2=Conexion::conexionbd()->prepare($sql_eli2);
      $ps->bindParam(1, $codigoU);
      $ps2->bindParam(1,$codigoU);

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

public function Login($nombre,$pass){

try {
  $log=Conexion::conexionbd()->prepare('call login(?,?)');
  $log->bindParam(1,$nombre);
  $log->bindParam(2,$pass);
  $log->execute();

  $datos =$log->fetchAll();

    
} catch (Exception $e) {
   echo"Error en el logn".$e;
}
  return $datos;
}

}










?>