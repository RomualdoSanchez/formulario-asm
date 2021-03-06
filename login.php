<?php session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
$errores = '';
#PREPARACION DE LOS DATOS QUE INGRESA EL USUARIO PARA COMPARA CON LA BD SI LAS PWD Y EL USR SON IGUALES
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    #CONEXION A LA BD
    try {
        $conexion = new PDO('mysql:host=localhost:3306;dbname=pruebass_Bd_prueba', 'pruebass_admin', 'GV%7B,Xt(oxs');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    #INGRESO AL CONTENIDO SI EL USR Y LA CONTRA SON LAS MISMAS QUE EN LA BD
    $statement = $conexion->prepare('SELECT * FROM users WHERE name = :usuario AND password = :password');
    $statement->execute(array(':usuario' => $usuario, ':password' => $password));
    $resultado = $statement->fetch();

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        $errores .= '<li>Datos incorrectos</li>';
    }
}
require 'views/login.view.php';
