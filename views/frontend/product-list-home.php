<?php 
use App\Models\Product;
$list_product = Product::where([['status','=',1],['category_id','=',$cat->id]])
->orderBy('created_at','DESC')
->limit(8)
->get();
?>
<div class="row product-list">
   <?php foreach($list_product as $product):?>
      <div class="col-6 col-md-3 mb-4">
            <div class="product-item border">
                  <div class="product-item-image">
                     <a href="product_detail.html">
                     <img src="/Website/NguyenTrongBao_CCQ2211AB/public/images/product/thoi-trang-nam-1.jpg" class="img-fluid" alt=""
                     id="img1">
                  <img class="img-fluid" src="/Website/NguyenTrongBao_CCQ2211AB/public/images/product/thoi-trang-nam-2.jpg" alt=""id="img2">
                  </a>
               </div>
               <h2 class="product-item-name text-main text-center fs-5 py-1">
                  <a href="product_detail.html">Thời trang nam 1</a>
               </h2>
               <h3 class="product-item-price fs-6 p-2 d-flex">
                     <div class="flex-fill"><del>200.000đ</del></div>
                  <div class="flex-fill text-end text-main">190.000đ</div>
               </h3>
            </div>
      </div>
   <?php endforeach;?>
</div>    