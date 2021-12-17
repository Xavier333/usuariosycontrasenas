<?php

    #inicializamos variables de sesion 
    session_start();
   # print_r($_SESSION);

    #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
    if ( isset( $_SESSION['usuario'] )!='administrador'  ){
       header("location:login.php");
        

    }

    $user = $_SESSION['usuario'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="./estilo.css" rel="stylesheet" type="text/css">
    <title>Guillermo Javier Campos - Usuario y Contraseñas</title>
</head>
<body class="bg-light">
    <canvas style="position: absolute;left:0;z-index: -1;" id="canvas" width="1366" height="2100"></canvas>

    <div class="container">
        <div class="tit-5 container">
            <h2 class="tit mt-5 display-3 animate__animated animate__flipInX text-center" style="font-size:6rem; !important;"><span>Usuarios & Contraseñas</span><br></h2>
                 <p class="tit-2 lead animate__animated animate__flipInX text-center" style="font-size :3rem; color:black; !important;">Ayuda para recordar tus Usuarios y Codigos de Contraseñas.</p>
            
        </div>

        <!--
            <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse " id="navbarText">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link active" aria-current="page" href="index_admin.php">Galeria</a> |
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link" href="listado.php">Listado</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link" href="galeria.php">Agregar Web</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link" href="usuario.php">Agregar Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link" href="codigos.php">Agregar Código</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success m-2 nav-link" href="cerrar.php"><span class=""><?php echo $_SESSION['usuario'] ?> </span>  Cerrar Sesión</a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        -->
        
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#EEEEEE">
                <div class="bg-info" style="text-align:center;" >
                    <h5 class="">   ////////</h5>
                    <h4 class=""><?php echo $user ?><a class="nav-link" style="font-size:1rem; background-color:#FFFFFF" href="cerrar.php">Cerrar    </a></h4>
                    
                </div>
            <div class="container-fluid ">
              
                    <!--
                        <a class="navbar-brand" href="#">U&C - </a>    
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>   
                    -->
                <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto ">
                        <a class="nav-link btn btn-outline-secondary m-2" aria-current="page" href="index_admin.php">Galeria</a>
                        <a class="nav-link btn btn-outline-secondary m-2" href="listado.php">Listado</a>
                        <a class="nav-link btn btn-outline-secondary m-2" href="galeria.php">Agregar Web</a>
                        <a class="nav-link btn btn-outline-secondary m-2" href="usuario.php">Agregar Usuario</a>
                        <a class="nav-link btn btn-outline-secondary m-2" href="codigos.php">Agregar Código</a>
                    </div>
                </div>
            </div>
        </nav>

        <hr class="my-4" style="height: 8px; color:black">