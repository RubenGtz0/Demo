<?php

/**
 * Parametros para configuración
 */

//Configuración del sistema
define("SITE_URL", "http://127.0.0.1/proyectsist");
define("KEY_TOKEN", "TU_TOKEN");
define("MONEDA", "$");

//Configuración para Paypal
define("CLIENT_ID", "TU_CLIENT_ID_PAYPAL");
define("CURRENCY", "MXN");

//Configuración para Mercado Pago
define("TOKEN_MP", "TEST-XXXXXXXXX");
define("PUBLIC_KEY_MP", "TEST-XXXXXXXXX");
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
