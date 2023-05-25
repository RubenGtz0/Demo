<?php

/**
 * Pantalla principal para mostrar el listado de productos
 */

require 'config/config.php';
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$comando = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS SHOP ONLINE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include 'menu.php'; ?>    <style>
    body {
        background-image: url('images/sp1.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 0vh;
        margin: 0px;
        padding: 0px;
    }
</style>

<div main class="p-3 mb-2 bg-gradient-primary text-white d-flex flex-column justify-content-center align-items-center" style="height: 90vh;">
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center">Sport Shop Online</h1>
        <br>
        <p class="lead text-center">Aprovecha las nuevas ofertas por lanzamiento oficial de la página. ¡Entra ahora!</p>
        <br>
        <div class="mt-auto">
            <button class="btn btn-primary" type="button" onclick="window.location.href=('catalogo.php')">Entrar</button>
        </div>
    </div>
</div>
</body>
script src="js/bootstrap.min.js"></script>
</html>
