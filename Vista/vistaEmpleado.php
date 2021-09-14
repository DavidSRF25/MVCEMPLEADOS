<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Vista/css/Styles.css">
    
    <title>Empleado</title>
   <script text="text/javascript"  src="Vista/js/jquery-3.3.1.min.js"></script>
   <script text="text/javascript" src="Vista/js/Empleados.js"></script>


</head>
<script type="text/javascript">
    function ConfirmDelete() {

        var respuesta = confirm("¿Estas seguro que deseas eliminar?");

        if (respuesta == true) {



            return true;
        } else {

            return false;

        }




    }
</script>

<body>


    

 
<nav>
    <div class="navbar">
      <div class="logo"><a href="#"><?php echo $of?></a></div>
      <ul class="menu">

        
            <li>
                <h3 class="Persona"><?php echo $usu ?></h3>
            </li>

            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="EMPLEADO.php">Empleado</a></li>
            <li><a href="DEPARTAMENTO.php">Departamento</a></li>
            

            <li>

                <img src="img/<?php echo $img ?>" alt="">


            </li>
            <li>
                <form action="login.php" method="post">
                    <input type="submit" name="cerrar" value="Cerrar">
                </form>
            </li>
        </ul>
    </div>
  </nav>
 

    <section class="form-register ">

        <div class="grid">

            <div class="iz">
                <form method="post" action="">

                    Codigo
                    <input class="controls" type="number" name="codigoE" require>
                    <br>
                    Apellido
                    <input class="controls" type="text" name="apellido" require>
                    <br>
                    Oficio
                    <select class="controls" name="opciones">
                        <option value="EMPLEADO">EMPLEADO</option>
                        <option value="VENDEDOR">VENDEDOR</option>
                        <option value="ANALISTA">ANALISTA</option>
                        <option value="DIRECTOR">DIRECTOR</option>
                        <option value="PRESIDENTE">PRESIDENTE</option>
                    </select><br><br>
                    Direccion
                    <input class="controls" type="text" name="direccion" require>
                    <br>
                    Ingreso
                    <input class="controls" type="date" name="fecha" require>
                    <br>
                    Salario
                    <input class="controls" type="number" name="salario" require>
                    <br>
                    Comision
                    <input class="controls" type="number" name="comision" require>
                    <br>
                    Departamento
                    <select class="controls" name="departamentos">
                        <option value="0">Seleccione</option>
                        <?php

                        if ($dp) {
                            foreach ($dp as $f) { ?>

                                <option value="<?php echo $f[0]; ?>"><?php echo $f[1]; ?></option>


                        <?php

                            }
                        }


                        ?>

                    </select><br><br>



            </div>
            <div class="dere">
                <input class="botons" type="submit" name="insertar" value="INSERTAR "><br>
                <input class="botons" id="consultar" type="button" name="consultar" value="CONSULTAR "><br>
                <input class="botons" type="submit" name="buscar" value="BUSCAR"><br>
                <input class="botons" type="submit" name="pdf" value="GENERAR PDF"><br>

            </div>
        </div> <br><br><br>
        </form>
        <?php

        if (isset($_POST['buscar'])) { ?>



            <form action="" method="post">

                <input class="control" type="text" name="criterio" require><br>
                <input class="botons" type="submit" name="busca" value="Consultar">
                <input class="botons" type="submit" name="buscaf" value="Consultar Fecha">

            </form>


        <?php
        }

        ?>

        <?php
        if((  isset($_POST['busca']) || isset($_POST['buscaf'])) && $datos) {


        ?>
            <table>

                <tr>
                    <th>Codigo</th>
                    <th>Apellido</th>
                    <th>Oficio</th>
                    <th>Direccion</th>
                    <th>Ingreso</th>
                    <th>Salario</th>
                    <th>Comision</th>
                    <th>Departamento</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>
                <tbody>
                    <?php

                    foreach ($datos as $d) { ?>




                        <tr>
                            <td><?php echo $d[0]; ?></td>
                            <td><?php echo $d[1]; ?></td>
                            <td><?php echo $d[2]; ?></td>
                            <td><?php echo $d[3]; ?></td>
                            <td><?php echo $d[4]; ?></td>
                            <td><?php echo $d[5]; ?></td>
                            <td><?php echo $d[6]; ?></td>
                            <td><?php echo $d[7]; ?></td>

                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $d[0]; ?>" name="criterio">
                                    <!---<input type="submit" value="Actualizar" name="Actualizar">-->
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $d[0]; ?>" name="criterio">
                                    <input type="button" onclick="return ConfirmDelete()" class=" eliminar" value="Borrar" name="borrar">
                                </form>
                            </td>





                        </tr>



                <?php

                    }
                }
                ?>
                </tbody>
            </table>
            <hr>



          <table id="tabla">
          <tr id="tr">
                    <th>Codigo</th>
                    <th>Apellido</th>
                    <th>Oficio</th>
                    <th>Direccion</th>
                    <th>Ingreso</th>
                    <th>Salario</th>
                    <th>Comision</th>
                    <th>Departamento</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>
                </tr>
                
            
           
                
          </table>




            <?php
            if (isset($_POST['Actualizar'])) {

                foreach ($datos as $f) {
            ?>


                    <form method="post" action="" class="modify">
                        <br><br>
                        <p><label>Codigo:<?php echo $f[0]; ?></label></p>
                        <input type="hidden" name="codigoEa" value="<?php echo $f[0]; ?>">


                        <br>
                        <p><label>Apellido: </label><input class="controlsactuua" type="text" name="apellidoa" value="<?php echo $f[1]; ?>"></p>

                        <br>
                        <p> <label> Oficio: </label> <select class="controlsactuua" name="opcionesa">

                                <option value="<?php echo $f[2]; ?>"><?php echo $f[2]; ?></option>
                                <option value="EMPLEADO">EMPLEADO</option>
                                <option value="VENDEDOR">VENDEDOR</option>
                                <option value="ANALISTA">ANALISTA</option>
                                <option value="DIRECTOR">DIRECTOR</option>
                                <option value="PRESIDENTE">PRESIDENTE</option>
                            </select><br><br>
                            Direccion
                            <input class="controlsactuua" type="text" name="direcciona" value="<?php echo $f[3]; ?>">
                            <br>
                            Ingreso
                            <input class="controlsactuua" type="date" name="fechaa" value="<?php echo $f[4]; ?>">
                            <br>
                            Salario
                            <input class="controlsactuua" type="number" name="salarioa" value="<?php echo $f[5]; ?>">
                            <br>
                            Comision
                            <input class="controlsactuua" type="number" name="comisiona" value="<?php echo $f[6]; ?>">
                            <br>
                            Departamento
                            <select class="controlsactuua" name="departamentosa">
                                <option value="<?php echo $f[8]; ?>"><?php echo $f[7]; ?></option>
                                <?php

                                if ($dp) {
                                    foreach ($dp as $f) { ?>

                                        <option value="<?php echo $f[0]; ?>"><?php echo $f[1]; ?></option>


                            <?php

                                    }
                                }
                            }



                            ?>

                            </select><br><br>
                            <input class="botons" type="submit" name="actualiza" value="ACTUALIZAR"><br>
                        <?php
                    }
                        ?>



                        </div>
                    </form>


    </section>


</body>

</html>