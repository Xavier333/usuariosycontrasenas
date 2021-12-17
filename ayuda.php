<?php include 'header.php'; ?>
    
    <div id="contact" class="container text-center">
            <header>
                <h2>Contactame</h2>
            </header>
            
            <div class="container d-flex justify-content-center">
                <div class="border-3 col-8"  >
                    <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Nombre">
                                    <br>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                    <br>
                                <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                            </div>
                            <div class="mb-3">
                            
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Motivo">
                                <br>
                                <textarea class="form-control" name="contenido" id="contenido" cols="10" rows="5" placeholder="Mensaje"></textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-light">Enviar</button>
                    </form>
                </div>
            </div>
    </div>