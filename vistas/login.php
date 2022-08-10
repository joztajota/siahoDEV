<?php
$mensaje=@$_GET['mensaje'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SIHAO</title>
        <?php include('layouts/stylesstartlogin.php');   ?>
    </head>
    <body class="bodyclass">

        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-4  " style="border: 5px solid #406494;">
                            <div class="row pt-2 pb-3">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image" style="border: 2px solid #406494; ">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center" >  
                                            <div class=" h4  mb-3 shine"><b>SIAHO</b></div>
                                        </div>
                                        <form name="login" id="login" action="funciones/funcionesGenerales/validarusu.php" method="POST">
                                            <div class="form-group" style="margin-top: 2%;">
                                                <input name="user" id="user"  class="form-control form-control-user"
                                                    aria-describedby="emailHelp" placeholder="Indicador">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" class="form-control form-control-user"
                                                placeholder="Contraseña">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-lg btn-block">ENTRAR</button>
                                            </div>
                                            <hr>
                                            <div class="form-group text-center" style="font-size:80%; margin-bottom: 5px; height: 10px;">
                                            <b> <?php echo $mensaje; ?></b>
                                            </div>                                       
                                        </form><hr>
                                        <div class="text-center"></div>
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('layouts/jsstartlogin.php');   ?>
    </body>
</html>