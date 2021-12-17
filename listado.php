<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 
 #si hay envio de datos, los inserto en la base de datos 
 if($_POST){

    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $direccionWeb = $_POST['direccionWeb'];
    $usuario = $_POST['usuario'];
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
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `direccionWeb`, `usuario`, `codigoContra`)  VALUES (NULL, '$nombre_proyecto', '$descripcion', '$direccionWeb', '$usuario', '$codigoContra')";
    
    
    $id_proyecto = $conexion->ejecutar($sql);

    #para que no inserte muchas veces
   # header("location:galeria.php");
 }
 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes


    $id = $_GET['borrar'];
    $conexion = new conexion();


/*
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM `proyectos` where id=".$id);
    #la borramos de la carpeta 
    unlink("imagenes/".$imagen[0]['imagen']);
*/

    #borramos el registro de la base 
    $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
    $id_proyecto = $conexion->ejecutar($sql);

     #para que no intente borrar muchas veces
    header("location:listado.php");
    
 }
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT proyectos.id, proyectos.nombre, proyectos.direccionWeb, proyectos.descripcion, usuarios.usuario, proyectos.codigoContra  FROM usuarios INNER JOIN proyectos ON proyectos.usuario = usuarios.id_usuarios");
 $codigoscontras= $conexion->consultar("SELECT * FROM `codigoscontra`");
 $usuarios= $conexion->consultar("SELECT * FROM `usuarios`");
 #$usuariocompleto= $conexion->consultar("SELECT `usuarios`.`usuario` FROM `usuarios` INNER JOIN `proyectos` ON `proyectos`.`usuario` = `usuarios`.`id_usuarios`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

 
?>
   <br>
<!--ya tenemos un container en el header que cierra en el footer-->
    <div class="p-1 bg-light">
        <div class="container">
            <h1 class="display-5">Listado de todos los sitios.</h1>
            <hr class="my-2">       
        </div>
    </div>
    
    <div class="row p-3">
        <div class="col-md-12">

            <table class="table">
                <thead>
                    <tr>
                        <!--<th>ID</th>-->
                        <th>Nombre</th>
                        <th id="direccion">Direccion Web</th>
                        <!--<th>Imagen</th>-->
                        <th>Descripcion</th>
                        <th>Usuario</th>
                        <th>Codigo Contraseña</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php #leemos proyectos 1 por 1
                    foreach($proyectos as $proyecto){ ?>
                   
                    <tr>
                        <!--<td scope="row"><?php echo $proyecto['id'];?></td>-->
                        <td><?php echo $proyecto['nombre'];?></td>
                        <td><a href="<?php echo $proyecto['direccionWeb'];?>" target="_blank" ><?php echo $proyecto['direccionWeb'];?></a></td>
                        <!--<td> <img width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">  </td>-->
                        <td><?php echo $proyecto['descripcion'];?></td>
                        <td><?php echo $proyecto['usuario'];?></td>
                        <td><?php echo $proyecto['codigoContra'];?></td>
                        <td><a name="editar" id="editar" class="btn btn-primary" href="./editar.php?editar=<?php echo $proyecto['id'];?>">Editar</a></td>
                        <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a></td>
                    </tr>

                    <?php #cerramos la llave del foreach
                    } ?>
                </tbody>
            </table>
        </div><!--cierra el col-->  
        
    </div><!--cierra el row-->

    
  




<?php include 'footer.php'; ?>