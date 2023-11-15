<?php

use App\Models\Contact; // Thay thế bằng namespace và tên lớp thật của bạn

$error = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["CONTACT"])) {
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $title = $_POST['title'];
   $content = $_POST['detail'];

   // Thêm thông tin liên hệ vào bảng contact
   $newContact = new Contact(); // Thay thế bằng tên lớp và namespace thật của bạn
   $newContact->name = $name;
   $newContact->phone = $phone;
   $newContact->email = $email;
   $newContact->title = $title;
   $newContact->content = $content;
   $newContact->created_at = date('Y-m-d H:i:s');
   $newContact->replay_id = 0; // Giả sử không có phản hồi ban đầu

   if ($newContact->save()) {
      $successMessage = "Thông tin liên hệ đã được gửi thành công.";
   } else {
      $error = "Gửi thông tin liên hệ thất bại. Vui lòng thử lại.";
   }
}

?>

<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Liên hệ
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="map-container">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
         <div class="col-md-6">
            <?php
            if (!empty($error)) {
               echo '<div class="alert alert-danger">' . $error . '</div>';
            }
            if (!empty($successMessage)) {
               echo '<div class="alert alert-success">' . $successMessage . '</div>';
            }
            ?>
            <form method="post" action="">
               <h1 class="text-main">LIÊN HỆ</h1>
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
               </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề" required>
               </div>
               <div class="mb-3">
                  <label for="detail" class="text-main">Nội dung</label>
                  <textarea name="detail" id="detail" class="form-control" placeholder="Nhập nội dung liên hệ" required></textarea>
               </div>
               <div class="mb-3">
                  <button type="submit" name="CONTACT" class="btn btn-main">Gửi liên hệ</button>
               </div>
            </form>

         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>