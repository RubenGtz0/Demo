<?php
require 'config/config.php';
require 'config/Database.php';
$db = new Database(); //base de datos
$con = $db->conectar(); // la conexion




$sql = $con->prepare("SELECT Id, Nombre, Precio FROM Productos WHERE Activo=1"); //Traer solicitudes preparadas
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

//session_destroy(); //Sirve para eliminar los datos que hay dentro del arreglo donde ves que productos haz añadido al carrito
print_r($_SESSION); //Manera manual de ver articulos en el carrito
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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach($resultado as $row) { ?>
        <div class="col">
          <div class="card shadow-sm" class="d-block w-100">
            <?php

            $id = $row['id'];
            $imagen = "images/productos/" . $id . "/principal.jpg" ;

            if (!file_exists($imagen)) {
                $imagen = "images/no-photo.jpg";
            }
            ?>
            <img src="<?php echo $imagen; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Nombre'];  ?></h5>
                <p class="card-text">$ <?php echo number_format($row['Precio'], 2, '.', ','); ?></p>
                <div class="d-flex justify-content-between aling-items-center">
                    <div class="btn-group">
                        <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo
                        hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn
                        btn-primary">Detalles</a>
                      </div>
                      <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id']; ?>,
                      '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar al carrito</button>
                          </div>
                        </div>
                      </div>
                  </div>
              <?php } ?>
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