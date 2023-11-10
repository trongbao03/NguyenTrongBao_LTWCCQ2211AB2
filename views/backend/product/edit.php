<?php

use App\Models\Product;



if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

  
   $product = Product::find($id);

   if ($product) {
      $error = ""; 

      
      if (isset($_POST['CAPNHAT'])) {
         
         $name = $_POST['name'];
         $slug = $_POST['slug'];
         $description = $_POST['description'];
         $status = $_POST['status'];

        
         $product->name = $name;
         $product->slug = $slug;
         $product->description = $description;
         $product->status = $status;

         $product->save();
         $error = 'Cập nhật thành công !!!';
         echo '<script>setTimeout(function() { window.location.href = "index.php?option=product"; },1000);</script>';
         exit;
      }
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
               <h1 class="d-inline">Cập nhật sản phẩm</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            <form action="index.php?option=product&cat=edit&id=<?= $product->id ?>" method="post">
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
               <a href="index.php?option=product" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label><?= $error ?></label>
                  </div>
                  <div class="mb-3">
                     <label>Tên sản phẩm (*)</label>
                     <input type="text" value="<?= $product->name; ?>" name="name" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Slug</label>
                     <input type="text" value="<?= $product->slug; ?>" name="slug" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>tên thuong hiệu</label>
                     <textarea name="description" class="form-control"><?= $product->description; ?></textarea>
                  </div>
                  <div class="mb-3">
                     <label>Hình đại diện</label>
                     <input type="file" name="image" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Trạng thái</label>
                     <select name="status" class="form-control">
                        <option value="1" <?= ($product->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= ($product->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </form>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>