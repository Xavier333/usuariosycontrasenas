<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 
  
  $id = 0;
 #si hay envio de datos, los inserto en la base de datos 
 if($_POST){

    $id = $_POST['id'];
    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $direccionWeb = $_POST['direccionWeb'];
    $usuario = $_POST['usuario'];
    $codigoContra = $_POST['codigo'];

    #echo $id;
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
    $sql="UPDATE `proyectos` SET  `nombre` = '$nombre_proyecto', `descripcion` = '$descripcion', `direccionWeb` = '$direccionWeb', `usuario` = '$usuario', `codigoContra` = '$codigoContra' WHERE `proyectos`.`id` = $id";
    
    $id_proyecto = $conexion->editar($sql);

    #para que no inserte muchas veces
    #header('Location:listado.php');
    
 }

 if ($_GET){

    $id = $_GET['editar'];
    $conexion = new conexion();

    $nombre_proyecto = $conexion->consultar("select nombre FROM `proyectos` where id=".$id);
    $descripcion = $conexion->consultar("select descripcion FROM `proyectos` where id=".$id);
    $direccionWeb = $conexion->consultar("select direccionWeb FROM `proyectos` where id=".$id);
    $usuarios = $conexion->consultar("SELECT * FROM `usuarios`");
    $usuariosel = $conexion->consultar("SELECT usuarios.id_usuarios, usuarios.usuario FROM usuarios INNER JOIN proyectos ON proyectos.usuario = usuarios.id_usuarios WHERE proyectos.id =".$id);
    $codigoscontras= $conexion->consultar("SELECT * FROM `codigoscontra`");
    $codigoContrav = $conexion->consultar("select codigoContra FROM `proyectos` where id=".$id);

    /*
    $descripcion = $_POST['descripcion'];
        $direccionWeb = $_POST['direccionWeb'];
        $usuario = $_POST['usuario'];
        $codigoContra = $_POST['codigoContra'];
*/

?>

    <div class="card">
                    <div class="card-header">
                    <h3> Datos del Sitio Web</h3>
                    </div>
                    
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        
                        <form action="editar.php" method="post" enctype="multipart/form-data">
                        
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="id">ID</label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" name="id" id="id" value="<?php echo $id?>">
                                </div>
                            </div>
                        
                            <hr class="tit-3" class="my-4">
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="nombre">Nombre del Sitio Web</label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre_proyecto[0]['nombre']?>">
                                </div>
                            </div>
                            
                            <hr class="tit-3" class="my-4">
                        <!--
                            <div>
                                <label for="archivo">Imagen del Proyecto</label>
                                <input required class="form-control" type="file" name ="archivo" id="archivo">
                            </div>
                        -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="direccionWeb">Direccion del Website:</label>
                                <div class="col-sm-10">
                                    <input required class="form-control" type="text" name ="direccionWeb" id="direccionWeb" value="<?php echo $direccionWeb[0]['direccionWeb']?>">
                                </div>
                            <div>

                            <hr class="tit-3" class="my-4">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="descripcion">Descripción del Sitio Web:</label>
                                <div class="col-sm-10">
                                    <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" value="Probeta"><?php echo $descripcion[0]['descripcion']?></textarea>
                                </div>
                            </div>

                            <hr class="tit-3" class="my-4">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="usuariolabel">Usuario:</label>
                                <div class="col-sm-10">
                                    <select name="usuario" id="usuario">
                                        <option value="<?php echo $usuariosel[0]['id_usuarios'];?>" selected><?php echo $usuariosel[0]['usuario'];?></option>
                                        <?php #leemos proyectos 1 por 1
                                            foreach($usuarios as $usuario){ ?>
                                                <option value="<?php echo $usuario['id_usuarios'];?>"><?php echo $usuario['usuario'];?></option>
                                                <?php #cerramos la llave del foreach
                                            } ?>
                                    </select>
                                </div>    
                            </div>

                            <hr class="tit-3" class="my-4">
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="codigoContra">Codigo de Contraseña:</label>
                            <!--
                                <input required class="form-control" type="option" name ="codigoContra" id="codigoContra" value="<?php echo $codigoContra[0]['codigoContra']?>">
                            -->
                                <div class="col-sm-10">
                                    <select name="codigo" id="codigo">
                                        <option value="<?php echo $codigoContrav[0]['codigoContra'];?>" selected><?php echo $codigoContrav[0]['codigoContra'];?></option>
                                        
                                        <?php #leemos proyectos 1 por 1
                                            foreach($codigoscontras as $codigoSolo){ ?>
                                                <option value="<?php echo $codigoSolo['codigos'];?>"><?php echo $codigoSolo['codigos'];?></option>
                                                <?php #cerramos la llave del foreach
                                            } ?>
                                        
                                    </select>
                                </div>    
                            </div>
                            
                            <div>
                                <br>
                                <input class="btn btn-success" type="submit" value="Editar">
                                <a class="btn btn-danger" type="button" href="./listado.php">Cancelar</a>
                            </div>

                        </form>
                    </div> <!--cierra el body-->
        
                </div><!--cierra el card-->
<?php
} 

if(!$_GET){
?>
 
    <h1 class="display-5">Se edito el sitio: <?php echo $direccionWeb ?></h1>
    <hr class="my-2">  
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
        
            <tr>
                <!--<td scope="row"><?php echo $proyecto['id'];?></td>-->
                <td><?php echo $nombre_proyecto;?></td>
                <td><a href="<?php echo $direccionWeb;?>" target="_blank" ><?php echo $direccionWeb;?></a></td>
                <!--<td> <img width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">  </td>-->
                <td><?php echo $descripcion;?></td>
                <td><?php echo $usuario;?></td>
                <td><?php echo $codigoContra;?></td>
                <td><a name="editar" id="editar" class="btn btn-primary" href="./editar.php?editar=<?php echo $id;?>">Editar</a></td>
                <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $id;?>">Eliminar</a></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>

<?php include 'footer.php'; ?>
