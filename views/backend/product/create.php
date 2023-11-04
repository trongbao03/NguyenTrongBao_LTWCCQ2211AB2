<?php

use App\Models\Product;

$eror = ""; // Khai báo biến lưu thông báo lỗi (ban đầu rỗng)
$thongbao = false;
if (isset($_POST['CHANGEADD'])) {
   // Lấy dữ liệu từ biểu mẫu
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $category_id = $_POST['category_id'];
   $brand_id = $_POST['brand_id'];
   $detail = $_POST['detail'];
   $price = $_POST['price'];
   $status = $_POST['status'];

   if (!empty($name) && !empty($category_id) && !empty($brand_id) && !empty($detail) && !empty($price)) {
      if (!empty($_FILES['image']['name'])) {
         $image = $_FILES['image']['name'];
         $target_dir = "đường dẫn đến thư mục lưu trữ hình ảnh";
         try {
            $product = new Product();
            $product->name = $name;
            $product->slug = $slug;
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->detail = $detail;
            $product->price = $price;
            $product->image = $image;
            $product->status = $status;
            $product->save();
            $thongbao = true;

            header("Location: index.php?option=product");
         } catch (Exception $e) {
            $eror = "Có lỗi khi lưu sản phẩm: " . $e->getMessage();
            $thongbao = false;
         }
      } else {
         $eror = "Vui lòng chọn một tệp hình ảnh.";
         $thongbao = false;
      }
   } else {
      $eror = "Vui lòng cung cấp đầy đủ thông tin sản phẩm.";
      $thongbao = false;
   }
}

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Thêm mới sản phẩm</h1>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <form action="index.php?option=product&cat=create" method="post" enctype="multipart/form-data">
         <div class="card">
            <div style="color: blue; font-size:1.2rem;" id="thongbao"></div>
            <div class="card-header text-right">
               <div class="row">
                  <div class="col-md-6">
                     <?php if ($thongbao == true) : ?>
                        <p style="color:green; font-size:1em;"><?php echo $eror; ?></p>
                     <?php else : ?>
                        <p style="color:red;font-size:1em"><?php echo $eror; ?></p>
                     <?php endif ?>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=product" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                     <button type="submit" class="btn btn-sm btn-success" name="CHANGEADD">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm sản phẩm
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-9">
                     <div class="mb-3">
                        <label>Tên sản phẩm (*)</label>
                        <input type="text" placeholder="Nhập tên sản phẩm" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" placeholder="Nhập slug" name="slug" class="form-control">
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label>Danh mục (*)</label>
                              <select name="category_id" class="form-control">
                                 <option value="">Chọn danh mục</option>
                                 <option value="1">Tên danh mục</option>
                                 <option value="2">danh mục áo</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label>Thương hiệu (*)</label>
                              <select name="brand_id" class="form-control">
                                 <option value="">Chọn thương hiệu</option>
                                 <option value="1">Tên thương hiệu</option>
                                 <option value="2">áo</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" placeholder="Nhập chi tiết sản phẩm" rows="5" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="mb-3">
                        <label>Giá bán (*)</label>
                        <input type="number" value="10000" min="10000" name="price" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
      </form>
</div>
</div>
</section>
</div>
<!-- END CONTENT -->
<?php require_once "../views/backend/footer.php"; ?>