<?php require_once('config/dbconn.php'); ?>


<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $products = $conn->query("SELECT * FROM products WHERE id = '$id' ");
    $products->execute();
    $product = $products->fetch(PDO::FETCH_OBJ);
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Pay Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container" style="margin-top: none">
            <a class="navbar-brand  text-white" href="#">Pay Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=AfmLnBPSMpVPG_MnykJL1uTezCy0dnrJKWEk7VmhRssv9JyqWC_t_yQXH4IC8UYkxhXrNezNpLBaLTDs&currency=USD">
        </script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                // value: '100' // Can also reference a variable or function
                                value: '<?php echo $product->price; ?>'
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function (orderData) {

                        window.location.href = 'index.php';
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
    </div>
    </div>


    <body>

</html>