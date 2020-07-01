<?php include_once('functions.php');?>

    <div class="brand">The Perfect Cup</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">The Perfect Cup</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php if ( isset($_SESSION['userlogin']) ) : ?>

                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="products.php">Products</a>
                    </li>

                        <?php if ( isAdmin() ) : ?>
                            <li>
                                <a href="AdminPanel/admin.php">Admin Panel</a>
                            </li>
                        <?php endif; ?>

                    <li>
                        <a href="index.php?logout=true">Logout</a>
                    </li>

                <?php endif; ?>
                
                <?php if ( !isset($_SESSION['userlogin']) ) : ?>

                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
                        <a href="login.php">LogIn</a>
                    </li>
                <?php endif; ?>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>