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
    <title>SPORTS SHOP ONLINE </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
  <style>
    /* Estilos adicionales para el apartado de contacto */
    body {
      padding: 0px;
    }
    .contact-info {
      max-width: 800px;
      margin: 0 auto;
      object-position: center;

    }
    .contact-info h2 {
      margin-bottom: 10px;
      text-align: center;
    }
    .contact-info p {
      margin-bottom: 10px;
    }
    .highlight {
      font-weight: bold;
      color: #007bff;
    }
    .team-members {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .team-member {
      width: 200px;
      margin: 20px;
      text-align: center;
    }
    .team-member .card {
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .team-member img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      object-position: center;
      border-radius: 50%;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .team-member h4 {
      margin-bottom: 5px;
    }
    .team-member p {
      margin-bottom: 10px;
    }
    .social-media-icons {
      list-style-type: none;
      padding: 0;
      display: flex;
      justify-content: center;
    }
    .social-media-icons li {
      margin: 5px;
    }
    .social-media-icons a {
      display: inline-block;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #007bff;
      color: #fff;
      text-align: center;
      line-height: 30px;
      transition: background-color 0.3s ease;
    }
    .social-media-icons a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body class="d-flex flex-column h-100">

<?php include 'menu.php'; ?>

<main class="flex-shrink-0">
        <div class="container">
          <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="contact-info">
          <h2>Conocenos</h2>
          <p>¡Bienvenido al Proyecto de Sistema de Ventas!</p>
          <p>En <span class="highlight"><a href="index">Sport Shop</span></a> estamos comprometidos en proporcionar soluciones de venta en línea altamente efectivas y personalizadas para tu negocio. Nuestro objetivo es ayudarte a impulsar tus ventas y alcanzar el éxito en el mundo digital.</p>
          <p>Ofrecemos un sistema de ventas moderno y escalable que te permite gestionar tu inventario, procesar pagos, realizar seguimiento de pedidos y más, todo en una plataforma fácil de usar y personalizable según tus necesidades.</p>
          <p>Nuestro equipo de expertos en desarrollo web y comercio electrónico está listo para brindarte el soporte y asesoramiento que necesitas en cada etapa del proceso. Nos enorgullece ofrecer un servicio al cliente excepcional y una experiencia de usuario de primera clase.</p>
          <p>Si estás interesado en conocer más acerca de cómo nuestro sistema de ventas puede beneficiar a tu negocio, no dudes en contactarnos utilizando los siguientes medios:</p>
          <div class="team-members">
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/rg.jpeg" alt="Integrante 1">
                <div class="card-body">
                  <h4 class="card-title">Rubén Gutiérrez</h4>
                  <p class="card-text">Desarrollador Web</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:gutierrezruben.000@gmail.com"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://www.instagram.com/ruben_gt0/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Repite el código de la tarjeta para los demás integrantes -->
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/haz.jpeg" alt="Integrante 1">
                <div class="card-body">
                  <h4 class="card-title">Hazel González</h4>
                  <p class="card-text">Desarrollador Web</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:byhazi9@gmail.com"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://www.instagram.com/hazelg9/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Repite el código de la tarjeta para los demás integrantes -->
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/alex.jpeg" alt="Integrante 1">
                <div class="card-body">
                  <h4 class="card-title">Alejandro Ríos</h4>
                  <p class="card-text">Desarrollador Web</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:gutierrezruben.000@gmail.com"><i class="fa fa-envelope"></i></a></li>
                   </ul>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Repite el código de la tarjeta para los demás integrantes -->
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/fra.jpeg" alt="Integrante 1">
                <div class="card-body">
                  <h4 class="card-title">Francisco Hernández</h4>
                  <p class="card-text">Desarrollador Web</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:frankhdezz1503@gmail.com"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://www.instagram.com/jvy3rh3rd3z/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Repite el código de la tarjeta para los demás integrantes -->
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/mel.jpeg" alt="Integran">
                <div class="card-body">
                  <h4 class="card-title">Melissa Rios</h4>
                  <p class="card-text">Gestion de soporte</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:riosmelisa32@gmail.com"><i class="fa fa-envelope"></i></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <div class="team-member">
              <div class="card">
                <img src="images/contacto/logoSSO.jpeg" alt="Integ">
                <div class="card-body">
                  <h4 class="card-title">CONTACTO</h4>
                  <p class="card-text">ASESORÍAS</p>
                  <ul class="social-media-icons">
                    <li><a href="mailto:sportshoponlineis@gmail.com"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="https://www.instagram.com/ruben_gt0/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?php include 'footer.php';?>
</body>
</main>
</html>  

