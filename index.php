<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT * FROM `inicio`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Guillermo Javier Campos - Usuario y Contraseñas</title>
        
        <!--<script src="2d.js"></script>-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Fjalla+One&display=swap" rel="stylesheet">  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="./estilo.css" rel="stylesheet" type="text/css">
        <style>
                body{
                    width: 100%;
                    overflow: visible;
                    background-color:black !important;
                    color: white !important;
                }
        </style>
    </head>
    <body class="bg-light">
        <canvas style="position: absolute;left:0;z-index: -1;" id="canvas" width="1366" height="2100"></canvas>
        
        <div class="container">
                <div class="tit-5 container ">
                
                    <h2 class="tit mt-5 display-3 animate__animated animate__flipInX text-center" style="font-size:6rem; !important;"><span>Usuarios y Contraseñas</span><br></h2>
                    <p class="tit-2 lead animate__animated animate__flipInX text-center" style="font-size :3rem; color:black; !important;">Ayuda para recordar tus Usuarios y Codigos de Contraseñas.</p>
                    
                    <hr class="my-4" style="color:black">
                    
                    <div class ="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card-header">
                                <div class="d-grid gap-3 col-8 mx-auto">                       
                                    <input type="button" onclick="location.href='./index_admin.php';" value="Accede a tu cuenta"/>
                                </div>
                            </div>
                            
                            <div class="card border border-3 shadow">
                            <!--
                                <div class="card-body">
                                
                                    <h5 class="card-title"></h5>
                                    <div class="d-grid gap-3 col-8 mx-auto">
                                        <a  class="btn btn-primary btn-lg">  Ingresar</a>
                                    </div>
                                
                                </div>
                            -->
                            </div>
                        </div>
                    
                        <div class="col">
                            <div class="card-header">
                                <div class="d-grid gap-1 col-8 mx-auto">                       
                                    <input type="button" onclick="location.href='#contact';" value="Registra una cuenta"/>
                                </div>
                            </div>
                            <div class="card border border-3 shadow">
                            <!--    
                                <div class="card-body">
                                
                                    <h3 style="font-family: sans-serif;" class="card-title"></h3>
                                    <div class="d-grid gap-3 col-8 mx-auto">
                                        <a href="#contact" class="btn btn-primary btn-lg">Registrate</a>
                                    </div>
                                </div>
                            -->
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" style="color:black">
                    <!--
                        <p>Accede a tu cuenta: | <a name="" id="" href="./index_admin.php">Ingresa</a> </p>
                        <p>Registra una cuenta: | <a name="" id=""   href="#contact">Registrate</a> </p>
                    -->

                </div>
        </div>
        <div class="container">
        
            <h2 class="text-white ">Ejemplo de registros:</h2>

            <div class ="row row-cols-1 row-cols-md-3 g-4">

            <?php #leemos proyectos 1 por 1
            foreach($proyectos as $proyecto){ ?>
        
                <div class="col">
                    <div class="card border border-3 shadow">
                        <!--<a href=""><img class="card-img-top" width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt=""></a>-->
                        <iframe src="<?php echo $proyecto['direccionWeb'];?>" title="<?php echo $proyecto['direccionWeb'];?>"></iframe>
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
        </div>

    <script src="js.js"></script>
    <?php include 'footer.php'; ?>
    </body>
</html>
   
   
   
  
    
   
