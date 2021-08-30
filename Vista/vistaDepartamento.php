<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Vista/css/Styles.css">
    <title>Departamento</title>
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

                    <br><br>
                    Codigo
                    <input class="controls" type="number" name="codigoD" require>
                    <br>
                    Nombre
                    <input class="controls" type="text" name="nombreD" require>
                    <br>

                    Localidad
                    <input class="controls" type="text" name="Localidad" require>
                    <br><br>

            </div>
            <div class="dere">
                <input class="botons" type="submit" name="insertar" value="INSERTAR "><br>
                <input class="botons" type="submit" name="consultar" value="CONSULTAR"><br>



            </div>
            </form>
        </div> <br><br><br>


        <?php

        if (isset($_POST['buscar'])) { ?>



            <form action="" method="post">

                <input class="controls" type="text" name="criterio" require>
                <input class="botons" type="submit" name="busca" value="Consultar">

            </form>


        <?php
        }

        ?>
        <?php
        if ((isset($_POST['consultar']) || isset($_POST['busca'])) && $datos) {


        ?>
            <table>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Localidad</th>
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
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $d[0]; ?>" name="criterio">
                                    <input type="submit" value="Actualizar" name="Actualizar">
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $d[0]; ?>" name="criterio">
                                    <input type="submit" onclick="return ConfirmDelete()" class="eliminar" value="Borrar" name="borrar">
                                </form>
                            </td>





                        </tr>



                <?php

                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            if (isset($_POST['Actualizar'])) {

                foreach ($datos as $f) {


            ?>
                    <form method="post" action="" class="modify">
                        <br><br>
                        <p><label>Codigo:<?php echo $f[0]; ?></label></p>
                        <input class="controls" type="hidden" name="codigoDa" value="<?php echo $f[0]; ?>">
                        <br>
                        Nombre:
                        <input class="controlsactuua" type="text" name="nombreDa" value="<?php echo $f[1]; ?>">
                        <br>

                        Localidad:
                        <input class="controlsactuua" type="text" name="Localidada" value="<?php echo $f[2]; ?>">
                        <br><br>
                        <input class="botons" type="submit" name="actualiza" value="ACTUALIZAR"><br>


                        <br><br>


                <?php }
            } ?>
                    </form>




    </section>


</body>

</html>