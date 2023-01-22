      <!-- >>>>> Component Notification Start <<<<<<< -->
      <div id="notifications">
          <div class="notifications_holder">
              <?php 
              $sql = "SELECT * FROM notifications ORDER BY id DESC";
              $query = mysqli_query($conn, $sql);
              while ($notification = mysqli_fetch_assoc($query)) {?>

              <div class="card:notifications <?=$notification['status']?>">
                  <div class="card_icon:notifications">
                      <i class="fa-solid fa-circle-info"></i>
                  </div>
                  <div class="card_content:notifications">
                      <p class="content__text:notifications"><?=$notification['message']?></p>
                  </div>
              </div>
              <?php
              }
              ?>
          </div>
      </div>