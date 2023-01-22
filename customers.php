<?php include './server/database/connection.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dream Library</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/links.css" />
    <link rel="stylesheet" href="theme/theme_1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- ------------------------------------
            Header Section Start 
    ---------------------------- -->
    <header id="header">
        <div class="header__branding">
            <!-- >>>>>> Component Brand Start <<<<<<< -->
            <div id="brand">
                <div class="brand__logo">
                    <img src="img/logo/logo.jpg" alt="" />
                </div>
                <h1 class="brand__name">Dream Library</h1>
            </div>
        </div>
        <div class="header__options">
            <!-- >>>>>> Component Options Start <<<<<<<  -->
            <div id="options">
                <div class="options__profile">
                    <img src="img/profile_photo/avater.png" alt="" />
                </div>
            </div>
        </div>
    </header>

    <!-- ------------------------------------
            Main Section Start 
    ---------------------------- -->
    <main id="main">
        <section id="left">
            <!-- >>>>>> Component navbar:vartical Start <<<<<<< -->
            <?php include './partials/vartical_nav.php'?>

        </section>

        <section id="center">

            <div class="table__holder">
                <!-- >>>>>> Component accordianTable Start <<<<<<< -->
                <div id="accordionTable">
                    <div class="table__header:accordionTable">
                        <h3 class="header__title:accordionTable">Customers</h3>
                        <!-- >>>>>> Component Searchbar Start <<<<<<< -->
                        <div id="searchbar__sm">
                            <i class="searchbar_icon fa-solid fa-magnifying-glass"></i>
                            <input class="searchbar_input" type="text" placeholder="Enter Books Name..." />
                            <i class="searchbar_icon fa-solid fa-xmark"></i>
                        </div>
                        <!-- >>>>>> Component Tabel Sort Start <<<<<<<<<<< -->
                        <div id="table__sort">
                            <input class="sort__indecator" type="radio" id="ascending" name="sort_data"
                                value="ascending" checked>
                            <label for="ascending" class="indecator__icon">
                                <i class=" fa-solid fa-arrow-up-wide-short"></i>
                            </label>
                            <input class="sort__indecator" type="radio" id="descending" name="sort_data"
                                value="descending">
                            <label for="descending" class="indecator__icon">
                                <i class=" fa-solid fa-arrow-down-wide-short"></i></label>
                        </div>
                    </div>
                    <div class="table__row header">
                        <p class="row__data">No.</p>
                        <p class="row__data">Name</p>
                        <p class="row__data">Mobile</p>
                        <p class="row__data">Date</p>
                    </div>
                    <?php
                        $sql = "SELECT * FROM customer";
                        $runSql = mysqli_query($conn, $sql);
                        while($customers = mysqli_fetch_assoc($runSql)){
                    ?>
                    <button class="table__row data">
                        <p class="row__data"><?=$customers['id']?></p>
                        <p class="row__data"><?=$customers['name']?></p>
                        <p class="row__data"><?=$customers['mobile']?></p>
                        <p class="row__data"><?=$customers['date']?></p>
                    </button>
                    <div class="table__row_panel">
                        <div class="row_panel__left">
                            <h5 class="panel__title">Customer Name</h5>
                            <p class="panel__data"><?=$customers['name']?></p>
                            <h5 class="panel__title">Last Date Of Perches</h5>
                            <p class="panel__data"><?=$customers['date']?></p>
                        </div>
                        <div class="row_panel__right">
                            <h5 class="panel__title">Product List</h5>
                            <p class="panel__data">Working</p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <section id="right">
            <!-- >>>>> Component Analytics Start <<<<<<< -->
            <?php include './partials/analytics.php'?>

            <!-- >>>>> Component Notification Start <<<<<<< -->
            <h3 class="section_title">Notification</h3>
            <?php include './partials/notifications.php'?>
        </section>
    </main>
    <script src="js/customers.js"></script>
</body>

</html>