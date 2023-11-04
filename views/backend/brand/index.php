<?php

use App\Models\Brand;

$dk = [
   ['status', '!=', 0],
   ['status', '!=', 0]
];
$list = Brand::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')
   ->get()
?>
<?php require_once "../views/backend/header.php"; ?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả thương hiệu</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <a href="index.php?option=brand" class="btn btn-success btn-sm">Tất cả</a> |
                  <a href="index.php?option=brand&cat=trash" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Thùng rác</a>
               </div>
               <div class="col-md-6 mb-2 text-right">
                  <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Lưu
                  </button>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="mb-3">
                     <label>Tên thương hiệu (*)</label>
                     <input type="text" name="name" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Slug</label>
                     <input type="text" name="slug" class="form-control">
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
               <div class="col-md-8">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tên thương hiệu</th>
                           <th>Tên slug</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img src="../public/images/brand/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                       <?php if ($item->status == 1) : ?>
                                          <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn btn-success btn-xs">
                                             <i class="fas fa-toggle-on"></i> Hiện
                                          </a> |
                                       <?php else : ?>
                                          <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                             <i class="fas fa-toggle-off"></i> Ẩn
                                          </a> |
                                       <?php endif; ?>
                                       <a href="index.php?option=brand&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                          <i class="far fa-edit"></i></i> Chỉnh sửa
                                       </a> |
                                       <a href="index.php?option=brand&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                          <i class="far fa-eye"></i></i> Chi tiết
                                       </a> |
                                       <a href="index.php?option=brand&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="far fa-trash-alt"></i></i> Xoá
                                       </a>
                                    </div>
                                 </td>
                                 <td><?= $item->slug; ?></td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>