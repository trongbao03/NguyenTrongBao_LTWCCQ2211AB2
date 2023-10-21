<?php
use App\Models\Contact;
$dk = [
   ['status','!=',0],
   ['status','!=',0]
];
$list = Contact::where('status','!=',0)
->orderBy('created_at','DESC')
->get()
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả liên hệ</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  Noi dung
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Tiêu đề</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(count($list)>0):?>
                           <?php foreach ($list as $item):?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->name;?>
                                    </div>
                                    <div class="function_style">
                                       <a href="#">Hiện</a> |
                                       <a href="#">Trả lời</a> |
                                       <a href="../backend/brand_show.html">Chi tiết</a> |
                                       <a href="#">Xoá</a>
                                    </div>
                                 </td>
                                 <td><?= $item->phone;?></td>
                                 <td><?= $item->email;?></td>
                                 <td><?= $item->content;?></td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>