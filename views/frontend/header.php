<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?? "TRONG BAO STORE"; ?></title>
   <link rel="stylesheet" href="/Website/NguyenTrongBao_CCQ2211AB/public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="/Website/NguyenTrongBao_CCQ2211AB/public/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="/Website/NguyenTrongBao_CCQ2211AB/public/css/frontend.css">
   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="public/jquery/jquery-3.7.0.min.js"></script>
   <script>
      $(document).ready(function() {
         const notificationOverlay = $('#notificationOverlay');
         const closeNotification = $('#closeNotification');
         const notification = $('.notification');

         function showNotification() {
            notificationOverlay.fadeIn();
            notification.fadeIn();
         }

         function hideNotification() {
            // Thêm hiệu ứng động khi ẩn thông báo
            notification.animate({
               scale: 0.9,
               opacity: 0
            }, 500, function() {
               // Gọi khi hiệu ứng hoàn tất
               notificationOverlay.fadeOut();
               notification.hide();
            });
         }

         $('.notification').on('click', function(event) {
            event.preventDefault();
            showNotification();
         });

         closeNotification.on('click', hideNotification);

         // Thêm hiệu ứng động cho thông báo khi hiển thị
         notification.animate({
            scale: 1.1,
            opacity: 1
         }, 500);
      });
   </script>
   <script>
      $(document).ready(function() {
         const notification = $('.notification');

         function startShake() {
            notification.addClass('notification-shake');
         }

         function stopShake() {
            notification.removeClass('notification-shake');
         }

         setInterval(function() {
            startShake();
            setTimeout(stopShake, 500);
         }, 1000); // Chạy mỗi giây

         // Thêm hiệu ứng động khi hiển thị
         notification.animate({
            scale: 1.1,
            opacity: 1
         }, 500);
      });
   </script>
</head>

<body>
   <div id="socialMediaButtons" class="social-media-buttons">
      <a href="https://www.facebook.com/profile.php?id=100065070340039" class="social-button facebook"><i class="fa-brands fa-facebook"></i></a>
      <a href="#" class="social-button twitter"><i class="fa-brands fa-twitter"></i></i></a>
      <a href="#" class="social-button instagram"><i class="fa-brands fa-instagram"></i></a>
      <a href="#" class="social-button notification"><i class="fa-solid fa-bell"></i></a>
   </div>
   <div class="notification-overlay" id="notificationOverlay">
      <div class="notification-content">
         <h2>Thông báo</h2>
         <p>Nội dung thông báo sẽ ở đây.</p>
         <button id="closeNotification">Đóng</button>
      </div>
   </div>
   <section class="hdl-header">
      <div class="container">
         <div class="row">
            <div class="col-6 col-sm-6 col-md-2 py-1">
               <a href="index.php">
                  <img src="/Website/NguyenTrongBao_CCQ2211AB/public/images/new_logo1.png" class="img-fluid" alt="Logo">
               </a>
            </div>
            <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text bg-main" id="basic-addon2">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
               </div>
            </div>
            <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2">
               <div class="call-login--register border-bottom">
                  <ul class="nav nav-fills py-0 my-0">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php?option=contact">
                           <i class="fa fa-phone-square" aria-hidden="true"></i>
                           0933804508
                        </a>
                     </li>
                     <?php if (isset($_SESSION['name'])) : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&profile=true">
                              <?php echo $_SESSION['name']; ?>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&logout=true">Đăng xuất</a>
                        </li>
                     <?php else : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&login=true">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="index.php?option=customer&register=true">Đăng ký</a>
                        </li>
                     <?php endif; ?>
                  </ul>
               </div>
            </div>
            <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2">
               <a href="index.php?option=cart">
                  <div class="box-cart float-end">
                     <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                     <span id="showcart">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                     </span>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </section>
   <section class="hdl-mainmenu bg-main">
      <div class="container">
         <div class="row">
            <div class="col-12 d-none d-md-block col-md-2 d-none d-md-block">
               <?php require_once 'views/frontend/mod-menu-listcategory.php'; ?>
            </div>
            <div class="col-12 col-md-9">
               <?php require_once 'views/frontend/mod-mainmenu.php'; ?>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-1 text-end">
               <div class="bell">
                  <i class="fa-solid fa-bell fa-shake"></i>
               </div>
            </div>
            <div class="col-11">
               <div class="marquee">
                  <marquee direction="left" scrollamount="12" ;>
                     <div style="white-space: nowrap;display: flex;align-items: center;">
                        <p>Giảm giá các mặt hàng đồ jean lên đến 20% tại TRONGBAOSHOP - GenZ Fashion New </p>
                     </div>
                  </marquee>
               </div>
            </div>
         </div>
      </div>
   </section>