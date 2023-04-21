<?php

define("KEY_TOKEN", "AHJR.ahjr123"); //Se definen las constantes 
//Token es un password para cifrar informacion 
define("MONEDA", "$");
//Se realiza la configuracion del proyecto

session_start();

$num_cart=0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart=count($_SESSION['carrito']['productos']);
}
?>
