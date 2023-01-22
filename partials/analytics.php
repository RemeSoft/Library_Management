        <?php
            $todays__revenue = 0;
            $total__revenue = 0;

            //Today's Sell_____________________________________________
            $date = date('Y-m-d');
            $sql = "SELECT * FROM history WHERE date = '$date'";
            $runSql = mysqli_query($conn, $sql);
            $todays__sell = mysqli_num_rows($runSql);

            

            //Total Sell_________________
            $sql = "SELECT * FROM history";
            $runSql = mysqli_query($conn, $sql);
            $total__sell = mysqli_num_rows($runSql);

            //Total Revenue__________________
            $sql = "SELECT * FROM history";
            $runSql = mysqli_query($conn, $sql);
            while ($sell = mysqli_fetch_assoc($runSql)){
                $total__revenue = $total__revenue + $sell['price'];
                $date = date('Y-m-d');
                if($sell['date'] == $date){
                    $todays__revenue = $todays__revenue + $sell['price'];
                }
            }
        ?>
        <!-- >>>>> Component Analytics Start <<<<<<< -->
        <div id="analytics">
            <div class="analytics_card">
                <h4 class="card_title:analytics">Daily Sell</h4>
                <div class="card_sub_title:analytics"><?=$todays__sell?> <small>Item</small></div>
            </div>
            <div class="analytics_card">
                <h4 class="card_title:analytics">Total Sell</h4>
                <div class="card_sub_title:analytics"><small><?=$total__sell?> Item</small></div>
            </div>
            <div class="analytics_card">
                <h4 class="card_title:analytics">Daily Revenue</h4>
                <div class="card_sub_title:analytics">&#2547; <?=$todays__revenue ?></div>
            </div>
            <div class="analytics_card">
                <h4 class="card_title:analytics">Total Revenue</h4>
                <div class="card_sub_title:analytics">&#2547; <?=$total__revenue ?></div>
            </div>
        </div>