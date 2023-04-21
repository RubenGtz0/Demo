<?php
//Se utiliza la misma hoja de diseño del index dentro del checkout este se utilizara para mostrar la informacion de productos 
//añadidos en el carrito
require 'config/config.php';
require 'config/Database.php';
$db = new Database(); //base de datos
$con = $db->conectar(); // la conexion

$producto=isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

print_r($_SESSION); //Muestra el contenido de articulos en el carrito de manera manual

$lista_carrito=array();

if($producto != null){
    foreach($producto as $clave => $cantidad){

        $sql= $con->prepare("SELECT Id, Nombre, Precio, descuento, $cantidad AS Cantidad FROM productos WHERE
        Id=? AND Activo=1");
        $sql->execute([($clave)]);
        $lista_carrito[]= $sql->fetchAll(PDO::FETCH_ASSOC);

    }
}

//session_destroy(); //Sirve para eliminar los datos que hay dentro del arreglo donde ves que productos haz añadido al carrito
//print_r($_SESSION); //Manera manual de ver articulos en el carrito
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
</head>

<body>
  
   
<header>
    
  <div class="navbar navbar-expand.lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand">
        <strong>Sport Shop</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHeader">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="#" class="nav-link active">Catalago</a>

        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">Contacto</a>

        </li>

      </ul>

      <a href="carrito.php"class="btn btn-primary">
        Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
      </a >
        
      </div>

    </div>
  </div>
</header>

<main>
    <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                    <th> Producto </th>
                    <th> Precio </th>
                    <th> Cantidad </th>
                    <th> Subtotal </th>
                    <th> </th>
                    </tr>
                    </thead>
                      <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia</b></td></tr>';
                        }else{
                            $total=0;
                            foreach($lista_carrito AS $producto){
                                $_id = $producto['Id'];
                                $nombre = $producto['Nombre'];
                                $precio = $producto['precio'];
                                $descuento = $producto['descuento'];
                                $precio_desc = $precio-(($precio*$descuento)/100);
                                $subtotal = $cantidad* $precio_desc;
                                $total += $subtotal;
                                ?>
                        <tr>
                            <td><?php echo $nombre;?></td>
                            <td><?php echo MONEDA .number_format($precio_desc,2 , '.', ','); ?></td>
                            <td> 
                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                                size="5" id="cantidad_<?php echo $_id; ?>" onchange="">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>"name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.',','); ?></div>
                            </td>
                            <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>"
                                data-bs-toogle="modal" data-bs-target="eliminaModal">Eliminar</a></td>
                        </tr>
                        <?php } ?> 
                      </tbody>
                        <?php } ?>
                </table>
              </div>
    </div>
            </div>
        </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>

<script>
function addProducto(id, token){//Se envia mediante ajax para poder actualizarlo de manera mas rapida 
      let url='clases/carrito.php'
      let formData=new FormData() //envia los parametros metodo post
      formData.append('id',id)
      formData.append('token',token)

      fetch(url,{
        method:'POST',
        body: formData,
        mode:'cors'
      }).then(response=>response.json())
      .then(data=> {
        if(data.ok){
          let elemento=document.getElementById("num_cart")
          elemento.innerHTML=data.numero
        }
      })
}
</script>

</body>
</html> 