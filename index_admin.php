<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();# es un objeto de tipo conexion,
 
 $proyectos= $conexion->consultar("SELECT proyectos.id, proyectos.nombre, proyectos.direccionWeb, proyectos.descripcion, usuarios.usuario, proyectos.codigoContra  FROM usuarios INNER JOIN proyectos ON proyectos.usuario = usuarios.id_usuarios");
 $usuarios= $conexion->consultar("SELECT * FROM `usuarios`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);
?>

<br>    
<!--bs5 jum-->
<div class="p-1 bg-light">
    <div class="container">
        <h1 class="display-5">Galeria de todos los sitios.</h1>
        <hr class="my-4" style="color:black">
    </div>
</div>

<div class ="p-3 row row-cols-1 row-cols-md-3 g-4">

<?php #leemos proyectos 1 por 1
 foreach($proyectos as $proyecto){ ?>
    <div class="col">
        <div class="card">
            <iframe src="<?php echo $proyecto['direccionWeb'];?>" title="<?php echo $proyecto['direccionWeb'];?>" scrolling="auto"></iframe>
            <div class="card-body">
                <p class="card-title text-dark"><strong>Nombre del Sitio: </strong><?php echo $proyecto['nombre'];?></p>
                <p class="card-title text-dark"><strong>Dirección Web: </strong><a href="<?php echo $proyecto['direccionWeb'];?>" class="card-text text-dark"><?php echo $proyecto['direccionWeb'];?></a></p>
                <p class="card-text text-dark"><strong>Descripción: </strong><?php echo $proyecto['descripcion'];?></p>
                <p class="card-text text-dark"><strong>Usuario: </strong><?php echo $proyecto['usuario'];?></p>
                <p class="card-text text-dark"><strong>Codigo Contraseña: </strong><?php echo $proyecto['codigoContra'];?></p>
            </div>
        </div>
    
    </div>
 <?php } ?>
</div>

<?php include 'footer.php'; ?>
