<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Vista/css/Styles.css">
    <title>Usuario</title>
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
            <li><a href="DEPARTAMENTO.php">Empleado</a></li>
            

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
 
    <br></br>
    <section class="form-register ">


        <div class="grid">

            <div class="iz">
                <form method="post" action="" enctype="multipart/form-data">
                    <br><br>
                    Codigo
                    <select class="controls" name="codigo">
                        <option value="0">Seleccione</option>
                        <?php

                        if ($emple) {
                            foreach ($emple as $f) { ?>

                                <option value="<?php echo $f[0]; ?>"><?php echo $f[1]; ?></option>


                        <?php

                            }
                        }

                        ?>

                    </select><br><br><br>
                    Nombre
                    <input class="controls" type="text" name="nombre" require>
                    <br>
                    Foto <br>
                    <input class="controls" type="file" name="foto" require>
                    <br>
                    Password
                    <input class="controls" type="password" name="password" require>
                    <br><br>



            </div>
            <div class="dere">

                <input class="botons" type="submit" name="insertar" value="INSERTAR "><br>
                <input class="botons" type="submit" name="consultar" value="CONSULTAR "><br>


                <input class="botons" type="submit" name="buscar" value="BUSCAR"><br>

            </div>
        </div> <br><br><br>
        </form>
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
                    <th>Foto</th>
                    <th>Password</th>
                    <th>Actualizar</th>
                    <th>Borrar</th>

                </tr>
                <tbody>
                    <?php

                    foreach ($datos as $f) { ?>




                        <tr>
                            <td><?php echo $f[0]; ?></td>
                            <td><?php echo $f[1]; ?></td>
                            <td><img src="img/<?php echo $f[2]; ?>" alt="" width="100"></td>
                            <td><?php echo $f[3]; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $f[0]; ?>" name="criterio">
                                    <input type="submit" value="Actualizar" name="Actualizar">
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $f[0]; ?>" name="criterio">
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
                    <form method="post" action="" enctype="multipart/form-data" class="modify">
                        <br><br>
                        <p><label>Codigo:<?php echo $f[0]; ?></label></p>
                        <input type="hidden" name="codigoa" value="<?php echo $f[0]; ?>">



                        Nombre
                        <input class="controlsactuua" type="text" name="nombrea" value="<?php echo $f[1]; ?>">
                        <br>

                        <p><label>Foto:<?php echo $f[2]; ?></label></p>
                        <input type="hidden" name="fotob" value="<?php echo $f[2]; ?>">
                        <input class="controlsactuua" type="file" name="fotoa" value="<?php echo $f[2]; ?>">
                        <br>
                        Password
                        <input class="controlsactuua" type="password" name="passworda" value="<?php echo $f[3]; ?>">
                        <br><br>
                        <input class="botons" type="submit" name="actualiza" value="ACTUALIZAR"><br>



                <?php


                }
            }
                ?>
                </div>
                    </form>
    </section>


</body>

</html>