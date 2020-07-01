<?php 
    if(isset($_POST['register'])){
    $firstname 		= $_POST['firstname'];
    $lastname 		= $_POST['lastname'];
    $email 			= $_POST['email'];
    $password 		= sha1($_POST['password']);
                     
    $sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES(?,?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$firstname, $lastname, $email, $password]);
                if($result){
                    echo '<div class="alert alert-success" role="alert">Registration Successfuly.</div>';
                }else{
                    echo '<div class="alert alert-success" role="alert">There were erros while saving the data.</div>';
                }
    }