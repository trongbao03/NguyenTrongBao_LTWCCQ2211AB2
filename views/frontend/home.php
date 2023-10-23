<?php

use App\Models\Category;
$list_category = Category::where([['parent_id','=',0],['status','=',1]])
->orderBy('sort_order','ASC')
->get();
?>
<?php require_once "views/frontend/header.php"; ?>
<?php require_once 'views/frontend/mod-slider.php';?>
   <section class="hdl-maincontent">
      <div class="container">
         <?php foreach($list_category as $cat):?>
         <div class="product-category mt-3">
            <div class="row">
               <div class="col-md-3">
                  <div class="category-title bg-main">
                     <h1 class="fs-5 py-3 text-center text-uppercase"><?= $cat->name;?></h1>
                     <img class="img-fluid d-none d-md-block" src="/Website/NguyenTrongBao_CCQ2211AB/public/images/category/<?= $cat->image;?>"
                        alt="<?= $cat->image;?>">
                  </div>
               </div>
               <div class="col-md-9">
               <?php require_once 'views/frontend/product-list-home.php';?> 
               </div>
            </div>
         </div>
         <?php endforeach;?>
      </div>
   </section>
   <?php require_once 'views/frontend/mod-lastpost.php';?>
<?php require_once "views/frontend/footer.php"; ?>