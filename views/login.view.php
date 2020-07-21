<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalabe=no, initial-scale=1.0, minium-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Simonetta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Login</title>
  </head>
  <body>
    <div class="contenedor">
      <h1 class="titulo">Iniciar sesion</h1>
      <hr class="border">

      <!--FORMULARIO-->
      <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!--USUARIO-->
        <div class="form-group">
          <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="usuario">
        </div>

        <!--CONTRASEÑA-->
        <div class="form-group">
          <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
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
        ¿No tienes cuenta?
        <a href="registro.php">Registrate</a>
      </p>
    </div><!--.contenedor-->
  </body>
</html>
