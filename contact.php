<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Contact</title>

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
    <style>
        #danger-notification {
            display: none;
        }

        #success-notification {
            display: none;
        }
    </style>

</head>

<body>

    <!-- NavBar -->
    <?php require_once('navbar.php'); ?>
    

    <!-- /.container -->
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>The Perfect Cup</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.4557903780455!2d-118.33880764857918!3d34.08346238050228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2b8d3b1e0287d%3A0x9cc32be17df028b8!2sMelrose+Ave%2C+Beverly+Hills%2C+CA+90210%2C+USA!5e0!3m2!1sen!2sca!4v1458950947899"
                        width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>123.456.7890</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:info@theperfectcup.com">info@theperfectcup.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>

                    <!-- Alert Danger -->
                    <div id="danger-notification" class="alert alert-danger" role="alert"></div>

                    <!-- Alert success -->
                    <div id="success-notification" class="alert alert-success" role="alert"></div>

                    <div id="add_err2"></div>
                    <form id="myContact" role="form" onsubmit = "return validate();">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="name" name="name" maxlength="25" minlength="2" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Subject</label>
                                <input type="text" id="subject" name="subject" maxlength="30" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="body" name="body" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="button" onclick="sendMail()" class="btn btn-default">Sent Message</button>
                            </div>
                        </div>
                    </form>
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

    <!-- Vireficaition input -->
    <script src="js/validation-contact.js"></script>
    
    <!-- PHPMailer Send Mail -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
    function sendMail(){
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
        $.ajax({
            url: 'sendmail.php',
            method: 'POST',
            dataType: 'json',
            data:{
            name: name.val(),
            email: email.val(),
            subject: subject.val(),
            body: body.val()
            }, success: function(response){
            $('#myContact')[0].reset();
            $('.alert-success').text("Message sent successfully.");
            document.getElementById('success-notification').style.display = 'block';
            }
        });
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
        caller.css('border','1px solid red');
        return false;
        }
        else
        {
        caller.css('border', '');
        return true;
        }
    }
    </script>

</body>

</html>