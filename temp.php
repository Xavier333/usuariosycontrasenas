
<?php include ('ruta del documento'); ?>
<?php include ($proyecto['direccionWeb']);?>

<img class="card-img-top" width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">

?editar=<?php echo $proyecto['id'];
?>

<?php
    "UPDATE `proyectos` SET `nombre` = 'Facebook v15', `descripcion` = 'Sitio de redes sociales.', `direccionWeb` = 'https://www.facebook.com/`, `usuario` = `Peperina`, `codigoContra` = `478` WHERE `proyectos`.`id` = 26";

    "UPDATE `proyectos` SET `nombre` = 'Facebook2', `imagen` = 'kkk.jpg2', `descripcion` = 'Sitio de redes sociales.2', `direccionWeb` = 'https://www.facebook.com/kk', `usuario` = 'Peperina2' WHERE `proyectos`.`id` = 26";

    echo '<script language="javascript">alert("Esta por borrar un registro.");</script>';
?>

    <option value="saab">Saab</option>
    <option value="opel">Opel</option>
    <option value="audi">Audi</option>

<?php

$proyectos= $conexion->consultar("SELECT proyectos.id, proyectos.nombre, proyectos.direccionWeb, proyectos.descripcion, usuarios.usuario, proyectos.codigoContra  FROM usuarios INNER JOIN proyectos ON proyectos.usuario = usuarios.id_usuarios");
"VALUES (NULL, '$nombre_proyecto' , `$imagen`, '$descripcion', `$direccionWeb`, `$usuario`, `$codigoContra`)";

?>

<?php

    $file = fopen("temp.txt", "w");
    fwrite($file, "$nombre" . PHP_EOL);
    fwrite($file, "$email" . PHP_EOL);
    fwrite($file, "$consulta" . PHP_EOL);
    fclose($file);

?>