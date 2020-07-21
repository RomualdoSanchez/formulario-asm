<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalabe=no, initial-scale=1.0, minium-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Simonetta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
  </head>
  <body>
    <div class="contenedor">
      <h1 class="titulo">Registrate</h1>
      <hr class="border">

      <!--FORMULARIO-->
      <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!--USUARIO-->
        <div class="form-group">
          <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Ingresar nombre:">
        </div>

        <!--EMAIL-->
        <div class="form-group">
          <i class="icono izquierda fa fa-user"></i><input type="email" name="email" class="usuario" placeholder="correo@correo.com">
        </div>

        <!--CONTRASEÑA-->
        <div class="form-group">
          <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
        </div>

        <!--CONFIRMAR CONTRASEÑA Y BOTON-->
        <div class="form-group">
          <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir contraseña">
          <!--BOTON-->
          <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
        </div>

        <?php if (!empty($errores)): ?>
          <div class="error">
            <ul>
              <?php echo $errores; ?>
            </ul>
          </div>
        <?php endif;?>
      </form><!--.formulario-->

      <p class="texto-registrate">
        ¿Ya tienes cuenta?
        <a href="login.php">Iniciar sesión</a>
      </p>
    </div><!--.contenedor-->
  </body>
</html>
