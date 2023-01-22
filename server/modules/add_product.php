<?php
include '../database/connection.php';
include '../modules/notification.php';

if (isset($_POST['submit'])) {
    echo "working";
    $upload__location = '../../img/books/';
    $file__name = $_FILES['filename']['name'];
    $tmp__location = $_FILES['filename']['tmp_name'];
    $product__code=$product__name=$product__category=$product__author=$product__price=$product__discount=$product__quantity=$provider__name=$provider__phone=$product__image=$product__background="";
    $product__image =  $file__name;

    $required__field = array();

    if (empty($_POST['product__code'])) {
        array_push($required__field,"Product Code");
    } else {
        $product__code=$_POST['product__code'];
    }
    if (empty($_POST['product__name'])) {
        array_push($required__field,"Product Name");
    } else {
        $product__name=$_POST['product__name'];
    }
    if (empty($_POST['product__category'])) {
        array_push($required__field,"Product Category");
    } else {
        $product__category   =  $_POST['product__category'];
    }
    if (empty($_POST['product__author'])) {
        array_push($required__field,"Product Author");
    } else {
        $product__author=$_POST['product__author'];
    }
    if (empty($_POST['product__price'])) {
        array_push($required__field,"Product Price");
    } else {
        $product__price=$_POST['product__price'];
    }
    if (empty($_POST['product__discount'])) {
        array_push($required__field,"Product Discount");
    } else {
        $product__discount   =  $_POST['product__discount'];
    }
    if (empty($_POST['product__quentity'])) {
        array_push($required__field,"Product Quentity");
    } else {
        $product__quantity=$_POST['product__quentity'];
    }
    if (empty($_POST['provider__name'])) {
        array_push($required__field,"Provider Name");
    } else {
        $provider__name=$_POST['provider__name'];
    }
    if (empty($_POST['provider__phone'])) {
        array_push($required__field,"Provider Phone");
    } else {
        $provider__phone=$_POST['provider__phone'];
    }
    if (empty($_POST['background'])) {
        array_push($required__field,"Backgorund");
    } else {
        $product__background =  $_POST['background'];
    }

    $requrie = implode(", ", $required__field);
    if(empty($requrie)){
        if(!empty($file__name)){
                move_uploaded_file($tmp__location,$upload__location.$file__name);
                $sql = "INSERT INTO product (code, name, category, author, price, discount, quantity, provider_name, provider_phone, image, background)
                        VALUES ('$product__code','$product__name','$product__category','$product__author','$product__price','$product__discount','$product__quantity','$provider__name', '$provider__phone', '$product__image','$product__background')";
                if ($conn->query($sql) === TRUE) {
                    notifications("Product Inserted Successfully","success");
                    header("Location: http://localhost/library_management/add_product.php");
                }else{
                    notifications("Product Inserting Failed",'warning');
                }
        }else{
            notifications("Insert Product Image","warning");
            header("Location: http://localhost/library_management/add_product.php");
        }
    }else{
        notifications("$requrie",'warning');
        header("Location: http://localhost/library_management/add_product.php");
    }
}
?>