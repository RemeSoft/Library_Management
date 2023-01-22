      <?php  
        $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        $index = '';
        $addproduct = '';
        $customer = '';
        $analytics = '';
    
        if($curPageName == "index.php" or ""){$index = 'active';}
        else if($curPageName == "add_product.php"){$addproduct = 'active';}
        else if($curPageName == "customers.php"){$customer = 'active';}
        else{$analytics = 'active';}

            
        
      ?>
      <!-- >>>>>> Component navbar:vartical Start <<<<<<< -->
      <nav id="navbar:vartical">
          <ul class="navbar__list:vartical">
              <li class="list__item:vartical <?=$index?>">
                  <a class="item__link:vartical <?=$index?>" href="index.php">
                      <i class="navbar__icon:vartical fa-solid fa-box"></i>
                      Products
                  </a>
              </li>
              <li class="list__item:vartical <?=$addproduct?>">
                  <a class="item__link:vartical <?=$addproduct?>" href="add_product.php">
                      <i class="navbar__icon:vartical fa-solid fa-plus"></i></i> Add Product</a>
              </li>
              <li class="list__item:vartical <?=$customer?>">
                  <a class="item__link:vartical <?=$customer?>" href="customers.php">
                      <i class="navbar__icon:vartical fa-solid fa-user"></i> Customers</a>
              </li>
              <li class="list__item:vartical <?=$analytics?>">
                  <a class="item__link:vartical <?=$analytics?>" href="">
                      <i class="navbar__icon:vartical fa-solid fa-microchip"></i></i> Actions</a>
              </li>
          </ul>
      </nav>