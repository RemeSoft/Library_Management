      <!-- >>>>>> Component Books Start <<<<<<< -->
      <div id="books">
          <div class="books__holder">
              <?php 
                    $sql = "SELECT * FROM product";
                    $runSql = mysqli_query($conn, $sql);
                    while($book = mysqli_fetch_assoc($runSql)){
                ?>
              <div class="card:books">
                  <a class=" hovered_button:books cart" href="sell_product.php?id=<?=$book['id']?>">
                      <i class="fa-solid fa-cart-shopping"></i>
                  </a>
                  <a class="hovered_button:books edit" href="update_product.php?id=<?=$book['id']?>">
                      <i class="fa-solid fa-pen"></i>
                  </a>
                  <div class="card__preview:books" style="background-color: <?=$book['background']?>" ;>
                      <div class=" card__category:books"><?=$book['category']?></div>
                      <img class="card__image:books" src="img/books/<?=$book['image']?>" alt="" />
                  </div>
                  <div class="card__content:books">
                      <p class="card__title:books"><?=$book['name']?></p>
                      <p class="card__price:books">
                          &#2547; <?=$book['price']?><span
                              class="price__discount:books"><del><?=$book['discount']?></del></span>
                      </p>
                  </div>
              </div>
              <?php }?>

          </div>
      </div>