<?php

include '../database/connection.php';
include '../modules/notification.php';

if (isset($_POST['submit'])) {
    $product__code=$customer__name=$customer__phone=$customer__address="";
    $required__field = array();

    if (empty($_POST['product__code'])) {
        array_push($required__field,"Product Code");
    } else {
        $product__code=$_POST['product__code'];
    }
    if (empty($_POST['product__price'])) {
        array_push($required__field,"Product Price");
    } else {
        $product__price=$_POST['product__price'];
    }
    if (empty($_POST['customer__name'])) {
        array_push($required__field,"Customer Name");
    } else {
        $customer__name=$_POST['customer__name'];
    }
    if (empty($_POST['customer__phone'])) {
        array_push($required__field,"Customer Phone");
    } else {
        $customer__phone=$_POST['customer__phone'];
    }
    if (empty($_POST['customer__address'])) {
        array_push($required__field,"Customer Address");
    } else {
        $customer__address= $_POST['customer__address'];
    }
    
    $requrie__field__string = implode(", ", $required__field);
    if(empty($requrie__field__string)){
        $sql = "SELECT * FROM customer WHERE mobile = '$customer__phone'";
        $run__sql = mysqli_query($conn, $sql);

        if (mysqli_num_rows($run__sql) > 0) {
            echo "previous Customer";
            $product__array = array();
            $customer__data = mysqli_fetch_assoc($run__sql);
            $customer__product = $customer__data['product'];
            $customer__id = $customer__data['id'];
            array_push($product__array, $customer__product);
            array_push($product__array, $product__code);

            $products__string = implode(", ", $product__array);
            $sql = "UPDATE customer SET product = '$products__string' WHERE id = $customer__id";

            if ($conn->query($sql) === TRUE) {
                notifications("Product Sell Successfully","success");
                
                $sql = "INSERT INTO history (product,price) VALUES ('$product__code','$product__price')";
                mysqli_query($conn, $sql);
                header("Location: http://localhost/library_management/index.php");
            } else {
                notifications("Product Sell Failed",'warning');
                header("Location: http://localhost/library_management/index.php");
            }
            $conn->close();
        }else{
            $sql = "INSERT INTO customer (name,mobile,address,product)
            VALUES ('$customer__name','$customer__phone','$customer__address','$product__code')";

            if ($conn->query($sql) === TRUE) {
                notifications("Product Sell Successfully","success");
                $sql = "INSERT INTO history (product,price) VALUES ('$product__code','$product__price')";
                mysqli_query($conn, $sql);
                header("Location: http://localhost/library_management/index.php");
            } else {
                notifications("Product Sell Failed",'warning');
                header("Location: http://localhost/library_management/index.php");
            }
            $conn->close();
        }
    }else{
        notifications("Please fill ".$requrie__field__string,'warning');
        header("Location: http://localhost/library_management/index.php");
    }
}
?>