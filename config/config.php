<?php

/**
 * Parametros para configuración
 */

//Configuración del sistema
define("SITE_URL", "http://127.0.0.1/proyectsist");
define("KEY_TOKEN", "TU_TOKEN");
define("MONEDA", "$");

//Configuración para Paypal
define("CLIENT_ID", "Abld8JVwFUQmfVc6Yws5XOKPe_25MSXGCQhM2d9pV8_l0hEp16VXhI9hSg44HSt88TlbgeCYK3WCZDPm");
define("CURRENCY", "MXN");

//Configuración para Mercado Pago
define("TOKEN_MP", "TEST-8841373638935141-052322-d1a90f113abc318cb7a7bbd014d839a2-250471414");
define("PUBLIC_KEY_MP", "TEST-9c9d468d-5357-4dd7-a35e-420299b12b92");
define("LOCALE_MP", "es-MX");


//Datos para envio de correo electronico
define("MAIL_HOST", "mail.SportShopOnlineis.com");
define("MAIL_USER", "SportShopOnlineis@gmail.com");
define("MAIL_PASS", "otnoktzgswjnwnww");
define("MAIL_PORT", "465");

session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
