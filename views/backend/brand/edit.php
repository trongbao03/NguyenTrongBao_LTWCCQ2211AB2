<?php

use App\Models\Brand;

if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

   $brand = Brand::find($id);

   if ($brand) {
      $error = "";

      if (isset($_REQUEST['CAPNHAT'])) {
         $name = $_POST['name'];
         $slug = $_POST['slug'];
         $description = $_POST['description'];
         $status = $_POST['status'];

         // Validate dữ liệu
         if ($name == '') {
            $error = 'Tên thương hiệu không được để trống';
         } else {
            // Cập nhật thương hiệu
            $brand->name = $name;
            $brand->slug = $slug;
            $brand->description = $description;
            $brand->status = $status;
            $brand->save();

            $error = 'Cập nhật thành công !!!';
            header("location:index.php?option=brand");
         }
      } else {
         $error = "thất bại !!!";
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
               <h1 class="d-inline">Cập nhật thương hiệu</h1>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            <form action="index.php?option=brand&cat=edit&id=<?= $brand->id ?>" method="post">
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>

               <a href="index.php?option=brand" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label>Tên thương hiệu (*)</label>
                     <input type="text" value="<?= $brand->name; ?>" name="name" class="form-control">
                     <?php if ($error != '') { ?>
                        <span class="text-danger"><?= $error; ?></span>
                     <?php } ?>
                  </div>
                  <div class="mb-3">
                     <label>Slug</label>
                     <input type="text" value="<?= $brand->slug; ?>" name="slug" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Mô tả</label>
                     <textarea name="description" class="form-control"><?= $brand->description; ?></textarea>
                  </div>
                  <div class="mb-3">
                     <label>Trạng thái</label>
                     <select name="status" class="form-control">
                        <option value="1" <?= ($brand->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= ($brand->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </form>
   </section>
</div>
<?php require_once "../views/backend/footer.php"; ?>