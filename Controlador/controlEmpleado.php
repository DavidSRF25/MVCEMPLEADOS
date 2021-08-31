<?php
    require_once('Modelo/modeloEmpleado.php');

    $empleado= new ModeloEmpleados();

    if($_POST['op']=='todos'){ 
    $empleado->ConsultaTodos();//Generar el json
    }


?>