<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

#SE RECIBEN LOS DATOS DEL USR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #SE GUARDA USR EN MINISCULA EN LA BD Y SE LIMMPIAN VALORES
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $correo = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //COMPROBACION DE QUE NO ESTEN VACIOS LOS CAMPOS
    $errores = '';

    if (empty($usuario) || empty($password) || empty($password2)) {
        $errores .= "<li> Por favor llena todos los datos </li>";
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost:3306;dbname=pruebass_Bd_prueba', 'pruebass_admin', 'GV%7B,Xt(oxs');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        #CONEXION A BD
        $statement = $conexion->prepare('SELECT * FROM users WHERE name = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();
        #COMPROBACION DE QUE EL USUARIO NO EXISTA EN LA BD
        if ($resultado != false) {
            $errores .= '<li>El usuario ya existe</li>';
        }

        #HASH DE LA CONTRASEÑA
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);

        #COMPROBACION DE QUE LAS CONTRASEÑAS SEAN IGUALES
        if ($password != $password2) {
            $errores .= '<li>Las contraseñas no son iguales</i>';
        }

    } #FIN COMPROBACION

    #GUARDAR DATOS EN BD
    if ($errores == '') {
        $statement = $conexion->prepare('INSERT INTO users(id, name, email, password) VALUES(null, :usuario, :email, :password)');
        $statement->execute(array(':usuario' => $usuario, ':email' => $correo, ':password' => $password));
        #REDIRECCION AL USUARIO A LLOGIN
        header('Location: login.php');
    }
} #FIN IF METHOD REQUEST
require 'views/registro.view.php';
