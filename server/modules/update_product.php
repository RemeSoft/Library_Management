<?php

include '../database/connection.php';
include '../modules/notification.php';

if (isset($_POST['submit'])) {
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
         $sql = "UPDATE product SET code='$product__code', name='$product__name', category='$product__category', author='$product__author', price='$product__price', discount='$product__discount', quantity='$product__quantity', provider_name='$provider__name', provider_phone='$provider__phone', background='$product__background' WHERE code = '$product__code'";
         if ($conn->query($sql) === TRUE) {
            notifications("Product Update Successfully","success");
            header("Location: http://localhost/library_management/index.php");
         }else{
            notifications("Product Update Failed",'warning');
         }

    }else{
        notifications("$requrie",'warning');
        header("Location: http://localhost/library_management/index.php");
    }
}

if(isset($_POST['remove'])){
    $product__code=$_POST['product__code'];
    $sql = "DELETE FROM product WHERE code='$product__code'";
    if ($conn->query($sql) === TRUE) {
       notifications("Product Delete Successfully","success");
       header("Location: http://localhost/library/index.php");
    } else {
       notifications("Product Delete Failed",'warning');
    }
    $conn->close();
}
?>