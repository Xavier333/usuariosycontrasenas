<?php include 'header.php'; ?>

    <div class="p-1 bg-light">
        <div class="container">
            <h1 class="display-5">Consulta via Email</h1>
            <hr class="my-2">       
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3>Datos de la consulta</h3>
                </div>

                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="enviar.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="text" name="nombre" id="nombre">
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
                            <label class="col-sm-2 col-form-label" for="email">Direccion de Email:</label>
                            <div class="col-sm-10">
                                <input required class="form-control" type="email" name ="email" id="email">
                            </div>
                        </div>

                        <hr class="tit-3" class="my-4">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="consulta">Consulta:</label>
                            <div class="col-sm-10">
                                <textarea required class="form-control" name="consulta" id="consulta" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <br>
                            <input class="col-sm-2 btn btn-success" type="submit" href="./galeria.php" value="Enviar Email">
                        </div>
                
                    </form>
                </div> <!--cierra el body-->
    
            </div><!--cierra el card-->
            
        </div><!--cierra el col-->

<?php include 'footer.php'; ?>