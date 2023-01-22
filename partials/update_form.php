<?php
include 'server/database/connection.php';
$book_id = $_GET['id'];
$sql = 'SELECT * FROM product WHERE id = '. $book_id;
$run_sql = mysqli_query($conn, $sql);
$book_data = mysqli_fetch_array($run_sql);
?>

<!-- >>>>>> Component Form Start <<<<<<< -->
<form id="form" name="add_product_form" action="server/modules/update_product.php" method="post"
    enctype="multipart/form-data">
    <div id="upload">
        <label class="upload__level" for="upload__input">
            <img class="lavel__image update" src="img/books/<?=$book_data['image']?>" alt="" />
        </label>
        <!-- <input class="upload__input" id="upload__input" type="file" name="filename"> -->
    </div>

    <!-- add product form inputs  -->
    <div class="form__inputs">
        <div class="inputs__multiple">
            <div class="inputs__item ">
                <i class="fa-solid fa-barcode"></i>
                <input class="item__element combain" type="text" placeholder="Enter Book Id" name="product__code"
                    value="<?=$book_data['code']?>">
            </div>
            <div class="inputs__item">
                <h5>TK</h5>
                <input class="item__element combain" type="text" placeholder="Enter Price" name="product__price"
                    value="<?=$book_data['price']?>">
            </div>
        </div>
        <div class="inputs__item ">
            <i class="fa-solid fa-book"></i>
            <input class="item__element" type="text" placeholder="Enter Books Name" name="product__name"
                value="<?=$book_data['name']?>">
        </div>
        <div class="inputs__item ">
            <i class="fa-solid fa-list"></i>
            <input class="item__element" type="text" placeholder="Enter Books Category" name="product__category"
                value="<?=$book_data['category']?>">
        </div>
        <div class="inputs__item ">
            <i class="fa-solid fa-pen"></i>
            <input class="item__element" type="text" placeholder="Enter Author Name" name="product__author"
                value="<?=$book_data['author']?>">
        </div>
        <div class="inputs__multiple">
            <div class="inputs__item ">
                <i class="fa-solid fa-tally"></i>
                <i class="fa-sharp fa-solid fa-boxes-stacked"></i>
                <input class="item__element combain" type="text" placeholder="Enter Quentity" name="product__quentity"
                    value="<?=$book_data['quantity']?>">
            </div>
            <div class="inputs__item">
                <h5>Discount</h5>
                <input class="item__element combain" type="text" placeholder="Enter parcentage" name="product__discount"
                    value="<?=$book_data['discount']?>">
            </div>
        </div>
        <div class="inputs__item ">
            <i class="fa-solid fa-user"></i>
            <input class="item__element" type="text" placeholder="Enter Book Provider Name" name="provider__name"
                value="<?=$book_data['provider_name']?>">
        </div>
        <div class="inputs__item ">
            <i class="fa-solid fa-phone"></i>
            <input class="item__element" type="text" placeholder="Enter Book Provider Number" name="provider__phone"
                value="<?=$book_data['provider_phone']?>">
        </div>
        <div class=" inputs__item" id="colors__container">
            <div class="color__picker">
                <input value="#ffe7e7" type="radio" class="picker__selector" name="color" id="color__1" checked>
                <label for="color__1" style="background-color: #ffe7e7" class="picker__display"></label>
                <input value="#DAF4C5" type="radio" class="picker__selector" name="color" id="color__2">
                <label for="color__2" style="background-color: #DAF4C5" class="picker__display"></label>
                <input value="#CA7759" type="radio" class="picker__selector" name="color" id="color__3">
                <label for="color__3" style="background-color: #CA7759" class="picker__display"></label>
                <input value="#ECE08C" type="radio" class="picker__selector" name="color" id="color__4">
                <label for="color__4" style="background-color: #ECE08C" class="picker__display"></label>
                <input value="#D1868B" type="radio" class="picker__selector" name="color" id="color__5">
                <label for="color__5" style="background-color: #D1868B" class="picker__display"></label>
                <input value="#D6C2C3" type="radio" class="picker__selector" name="color" id="color__6">
                <label for="color__6" style="background-color: #D6C2C3" class="picker__display"></label>
                <input value="#8E4E68" type="radio" class="picker__selector" name="color" id="color__7">
                <label for="color__7" style="background-color: #8E4E68" class="picker__display"></label>
            </div>
            <input id="color__input" class="item__element" type="text" placeholder="Enter Color Code"
                value="<?=$book_data['background']?>" name="background">
        </div>
        <div class="form__buttons">
            <button class="form_button" type="submit" name="remove">Delete Product</button>
            <button class="form_button" type="submit" name="submit">Update Product</button>
        </div>
    </div>
</form>