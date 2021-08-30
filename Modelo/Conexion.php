<?php 




class Conexion{



    public static function conexionbd(){

              try{
               
                
                $con= new  PDO('mysql:host=localhost;dbname=empleados','root','3132046059Da%');

                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                




              }catch(Exception $e){

                die("Error en la conexion".$e->getMessage());
                echo ("Linea de Error ".$e->getLine());


              }
              return $con;


    }


}




//Conexion::conexionbd();




?>