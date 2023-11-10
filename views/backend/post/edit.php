<?php

use App\Models\Post;
use Illuminate\Support\Str;

if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];

   $post = Post::find($id);

   if ($post) {
      $error = "";

      if (isset($_POST['CAPNHAT'])) { 
         $title = isset($_POST['title']) ? $_POST['title'] : '';
         if ($title == '') {
            $error = 'Tiêu đề bài viết không được để trống';
         }
         if ($error == "") {
            $post->title = $title;
            $post->slug = isset($_POST['slug']) ? $_POST['slug'] : Str::slug($title);
            $post->description = isset($_POST['description']) ? $_POST['description'] : '';
            $post->status = isset($_POST['status']) ? $_POST['status'] : 'publish';

            $post->save(['title', 'slug', 'description', 'status']);

            $error = 'Cập nhật thành công !!!';

            echo '<script>setTimeout(function() { window.location.href = "index.php?option=post"; },1000);</script>';

            exit;
         }
      }
   }
}

?>


<?php require_once "../views/backend/header.php"; ?>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Cập nhật bài viết</h1>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            <form action="index.php?option=post&cat=edit&id=<?= $post->id ?>" method="post" enctype="multipart/form-data">
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
               <a href="index.php?option=post" class="btn btn-sm btn-info">
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
                     <label>Tiêu đề bài viết (*)</label>
                     <input type="text" value="<?= $post->title; ?>" name="title" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Slug</label>
                     <input type="text" value="<?= $post->slug; ?>" name="slug" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Nội dung bài viết</label>
                     <textarea name="description" class="form-control"><?= $post->description; ?></textarea>
                  </div>
                  <div class="mb-3">
                     <label>Hình đại diện</label>
                     <input type="file" name="image" class="form-control">
                     <?php if ($post->image != '') { ?>
                        <img src="../uploads/posts/<?= $post->image; ?>" width="120px" />
                     <?php } ?>
                  </div>
                  <div class="mb-3">
                     <label>Trạng thái</label>
                     <select name="status" class="form-control">
                        <option value="1" <?= ($post->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="2" <?= ($post->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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