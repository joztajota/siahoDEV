<!DOCTYPE html>
<html>
  <head>  
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <title>Report Instructivo Nro 5</title>
    
    <link rel="icon" href="public/dist/img/rafay-160x160.jpg" type="image/x-icon" />
    <link href="public/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="public/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      body,td,th {
      font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #FFF;
      }

      #inicial { background: url(public/img/onapre/fondo3.jpg) center fixed no-repeat} 
      h1,h2,h3,h4,h5,h6 {  font-family: "Source Sans Pro", sans-serif;    color: white;   }
    </style>
  </head>
  <body id="inicial" class="">
<div class="login-box">
  <div class="login-logo">
      <img src="public/img/logo5.png" width="250" height="80"> </div>
      <div class="login-box-body" style="background:#be3500">
        <p class="login-box-msg">
          <H3 align="left">&nbsp;&nbsp;Reportes Intructivo Nro.5</H3>        
          <H5> Coloque su Usuario y contraseña</H5>
        </p>
        <form name="login" id="login" action="funciones/validarusu.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" name="user" id="user" required class="form-control" placeholder="Usuario" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" required class="form-control" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn-block btn-flat" style="color: #8c8989">ACCEDER</button>
            </div>
          </div>
        </form>
      </div> 
     </div>
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  </body>
</html>
