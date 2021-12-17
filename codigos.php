<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 
 #si hay envio de datos, los inserto en la base de datos 
 if($_POST){

    #echo '<script language="javascript">alert("Esta por borrar un registro.");</script>';
    $codigoContra = $_POST['codigo'];
    #nombre de la imagen

    /*
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);
    */

    #creo una instancia(objeto) de la clase de conexion
    
    $conexion = new conexion();
    $sql="INSERT INTO `codigoscontra` (`codigos`) VALUES ('$codigoContra');";
        
    $id_proyecto = $conexion->ejecutar($sql);
        
    #para que no inserte muchas veces
    #header("location:codigos.php");
 }
 #si nos envian por url, get 
 
 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes


    $codigo = $_GET['borrar'];
    $conexion = new conexion();


/*
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM `proyectos` where id=".$id);
    #la borramos de la carpeta 
    unlink("imagenes/".$imagen[0]['imagen']);
*/

    #borramos el registro de la base 
    $sql ="DELETE FROM `codigoscontra` WHERE `codigoscontra`.`codigos` =".$codigo; 
    $id_proyecto = $conexion->ejecutar($sql);

     #para que no intente borrar muchas veces
    header("location:codigos.php");
    
 }
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
 $codigoscontras= $conexion->consultar("SELECT * FROM `codigoscontra`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);
 
?>
   <br>
<!--ya tenemos un container en el header que cierra en el footer-->
    <div class="p-1 bg-light">
        <div class="container">
            <h1 class="display-5">Agregar Codigo de contraseña</h1>
            <hr class="my-2">       
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Datos del Codigo de Contraseña</h3>
                </div>

                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="codigos.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="codigo">Codigo Contraseña</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="number" name="codigo" id="codigo">
                            </div>
                        </div>
                        <hr class="tit-3" class="my-4">
                    <!--
                        <div>
                            <label for="archivo">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="direccionWeb">Direccion del Website:</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name ="direccionWeb" id="direccionWeb">
                            </div>
                        </div>

                        <hr class="tit-3" class="my-4">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="descripcion">Descripción del Sitio Web:</label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <hr class="tit-3" class="my-4">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="usuario">Usuario:</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name ="usuario" id="usuario">
                            </div>
                        </div>

                        <hr class="tit-3" class="my-4">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"  for="codigoContra">Codigo de Contraseña:</label>
                            <div class="col-sm-10">
                                <select name="codigo" id="codigo">
                                    <?php #leemos proyectos 1 por 1
                                        foreach($codigoscontras as $codigoContra){ ?>
                                            <option value="<?php echo $codigoContra['codigos'];?>"><?php echo $codigoContra['codigos'];?></option>
                                            <?php #cerramos la llave del foreach
                                        } ?>
                                </select>
                            </div>    
                        <div>
                        <br>
                        -->
                            <input class="col-sm-2 btn btn-success" type="submit" value="Agregar">
                        </div>
                    </form>
                </div> <!--cierra el body-->
            </div><!--cierra el card-->
            
        </div><!--cierra el col-->
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Codigo Contraseña</th>
                        <!--<th>Editar</th>-->
                        <th>Cantidad de Uso</th>
                        <th>Eliminar</th>
                        <!--
                        <th>Direccion Web</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Usuario</th>
                        <th>Codigo Contraseña</th>
                        -->
                    </tr>
                </thead>
                <tbody>
                    <?php #leemos proyectos 1 por 1
                    $cuenta = 0;
                    foreach($codigoscontras as $codigos){ 
                        $cuenta = $cuenta + 1; ?>
                    <tr>
                        <td><?php echo $cuenta;?></td>
                        <td><?php echo $codigos['codigos'];?></td>
                        <?php 
                        $codigoSelect = $codigos['codigos'];
                        $conexion = new conexion();
                        $cantDeUso = $conexion->consultar("SELECT COUNT(*) FROM proyectos WHERE proyectos.codigoContra =".$codigoSelect);                        
                        ?>
                        <td><?php echo $cantDeUso[0][0];?></td>
                        <?php
                            if($cantDeUso[0][0] < 1 ) { 
                        ?>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $codigos['codigos'];?>">Eliminar</a></td>
                        <?php       
                            } 
                        ?>
                        <!--
                        <td scope="row"><?php echo $proyecto['id'];?></td>
                        <td><a href="<?php echo $proyecto['direccionWeb'];?>" target="_blank" ><?php echo $proyecto['direccionWeb'];?></a></td>
                        <td> <img width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                        <td><?php echo $proyecto['descripcion'];?></td>
                        <td><?php echo $proyecto['usuario'];?></td>
                        <td><?php echo $proyecto['codigoContra'];?></td>-->
                        <!--<td><a name="editar" id="editar" class="btn btn-primary" href="./codigos.php?editar=<?php echo $codigos['codigos'];?>">Editar</a></td>-->
                                              
                    </tr>
                    <?php #cerramos la llave del foreach
                    } ?>
                </tbody>
            </table>
        </div><!--cierra el col-->  
        
    </div><!--cierra el row-->

<?php include 'footer.php'; ?>