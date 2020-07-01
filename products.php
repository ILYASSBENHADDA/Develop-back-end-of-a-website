<?php 
    include('AdminPanel/action.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Products</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <!-- NavBar -->
    <?php require_once('navbar.php'); ?>

    
    <!-- /.container -->
    <div class="container">
        <?php
            $query = "SELECT * FROM product";	
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
        ?>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">PRODUCTS
                    </h2>
                    <hr>
                    
                    <?php while($row=$result->fetch_assoc()) { ?>
                        <div class="col-lg-12 text-center">
                            <img class="img-responsive img-border img-full" src="AdminPanel/<?= $row['product_image']; ?>">
                            <h2> <?= $row['product_name']; ?>
                                <br>
                                <small> <?= $row['product_date']; ?> </small>
                            </h2>
                            <h3><?= $row['product_price']; ?>$</h3>
                            <p> <?= $row['product_description']; ?> </p>
                            <a href="#" class="btn btn-default btn-lg">Add to cart</a>
                            <hr>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; The Perfect Cup 2019</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>