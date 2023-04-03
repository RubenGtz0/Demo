<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AcHIxXDPERIZvU5eYT0CNJpsrfs7uHEJw_kO5FqXpiVUm6smLIXCnmGhYK8Bpnr-istwePd7iayGGSHq&currency=MXN"></script>
</head>
<body>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
                color:'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units:[{
                        amount: {

                            value: 100
                        }
                    }]
                });
            },
            onAprove: function(data,actions){
                actions.order.capture().then(function(detalles){
                window.location.href=""
                });
            },
            onCancel: function(data){
                alert("pago cancelado");
                console.log(data);

            }

        }).render('#paypal-button-container')
    </script>
    <h1>
        hello
    </h1>
</body>
</html>