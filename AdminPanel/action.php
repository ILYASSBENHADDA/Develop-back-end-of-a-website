<?php
session_start();
include_once("config.php");

// ADD PRODUCT

if(isset($_POST['add'])){
    $product_name 		    = $_POST['product_name'];
    $product_price 		    = $_POST['product_price'];
    $product_description    = $_POST['product_description'];
    $product_image          = $_FILES['product_image']['name'];
    $upload                 = "uploads/".$product_image;
                     
    $query = "INSERT INTO product (product_name, product_price, product_description, product_image) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss",$product_name, $product_price, $product_description, $upload);
    $stmt->execute();
    move_uploaded_file($_FILES['product_image']['tmp_name'], $upload);
    
    header('location: add_product.php');
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";

}

// DELETE PRODUCT

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "SELECT product_image FROM product WHERE id=?";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bind_param("i",$id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row = $result2->fetch_assoc();

    $imagepath=$row['product_image'];
    unlink($imagepath);

    $query = "DELETE FROM product WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location: add_product.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";
}

// EDIT PRODUCT
$update = false;
$id                  ="";
$product_name        ="";
$product_price       ="";
$product_description ="";
$product_image       ="";

if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM product WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id                    = $row['id'];
    $product_name          = $row['product_name'];
    $product_price         = $row['product_price']; 
    $product_description   = $row['product_description'];
    $product_image         = $row['product_image'];
    
    $update = true;
}

if(isset($_POST['update'])) {
    $id                     = $_POST['id'];
    $product_name 		    = $_POST['product_name'];
    $product_price 		    = $_POST['product_price'];
    $product_description    = $_POST['product_description'];
    $oldimage               = $_POST['oldimage'];

    if(isset($_FILES['product_image']['tmp_name'])&&($_FILES['product_image']['tmp_name']!="")){
        $newimage = "uploads/".$_FILES['product_image']['name'];
        unlink($oldimage);
        move_uploaded_file($_FILES['product_image']['tmp_name'], $newimage);
    }
    else {
        $newimage=$oldimage;
    }
    $query="UPDATE product SET product_name=?, product_price=?, product_description=?, product_image=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi",$product_name, $product_price, $product_description, $newimage, $id);
    $stmt->execute();

    header('location: add_product.php');
    $_SESSION['response']="Record Update Successfully!";
    $_SESSION['res_type']="success";
}

// PREVIEW
// if(isset($_GET['view'])) {
//     $id = $_GET['view'];

//     $query = "SELECT * FROM product WHERE id=?";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("i",$id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_assoc();

//     $vid                    = $row['id'];
//     $vproduct_name          = $row['product_name'];
//     $vproduct_price         = $row['product_price']; 
//     $vproduct_description   = $row['product_description'];
//     $vproduct_image         = $row['product_image'];
    
    
// }