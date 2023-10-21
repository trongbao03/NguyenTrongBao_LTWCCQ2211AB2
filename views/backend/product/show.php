<?php
use App\Models\Product;
$dk = [
   ['status','!=',0],
   ['status','!=',0]
];
$id=$_REQUEST['id'];
$product = Product::find($id);
if($product==null)
{
    header("location:index.php?option=product");
}
?>
<?php require_once "../views/backend/header.php"; ?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="row">
                     <div class="col-md-12 text-right">
                        <a href="index.php?option=product" class="btn btn-sm btn-info">
                           <i class="fa fa-arrow-left" aria-hidden="true"></i>
                           Về danh sách
                        </a>
                     </div>
                  </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Tên trường</th>
                                 <th>Giá trị</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>ID</td>
                                 <td><?=$product->id;?></td>
                              </tr>
                              <tr>
                                 <td>NAME</td>
                                 <td><?=$product->name;?></td>
                              </tr>
                              <tr>
                                 <td>SLUG</td>
                                 <td><?=$product->slug;?></td>
                              </tr>
                              <tr>
                                 <td>IMAGE</td>
                                 <td><img src="../public/images/product/<?= $product->image;?>" 
                                          alt="<?= $product->image;?>"></td>
                              </tr>
                              <tr>
                                 <td>SORT_ORDER</td>
                                 <td><?=$product->sort_order;?></td>
                              </tr>
                              <tr>
                                 <td>DESCRIPTION</td>
                                 <td><?=$product->description;?></td>
                              </tr>
                              <tr>
                                 <td>CREATED_BY</td>
                                 <td><?=$product->created_by;?></td>
                              </tr>
                              <tr>
                                 <td>UPDATED_AT</td>
                                 <td><?=$product->updated_at;?></td>
                              </tr>
                              <tr>
                                 <td>UPDATED_BY</td>
                                 <td><?=$product->updated_by;?></td>
                              </tr>
                              <tr>
                                 <td>STATUS</td>
                                 <td><?=$product->status;?></td>
                              </tr>
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