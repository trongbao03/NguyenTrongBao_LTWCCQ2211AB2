<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <style>
        body{
            padding: 50px;
            background-image: url('../public/images/background-thiet-ke-thoi-trang_025658046.jpg');
            background-size: cover;
        }
        .swapper{
            max-width: 600px;
            margin: auto;
            box-shadow: 1px 0px 3px black;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<?php
require_once '../vendor/autoload.php';

    use App\Models\User;
    $error=NULL;
    if (isset($_POST['DANGNHAP'])) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $args = [
            ['roles', '=', 1],
            ['status', '=', 1],
        ];

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $username];
        } else {

            $args[] = ['username', '=', $username];
        }


        $user = User::where($args)->first();

        if ($user !== null && $user->password === $password) {

            $_SESSION['useradmin'] = $username;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['image'] = $user->image;
            session_start();
            header('location:index.php');
            $_SESSION['useradmin'] = $username;
        } else {
            $error = "Đăng nhập thất bại. Vui lòng kiểm tra tên người dùng hoặc mật khẩu.";
        }
    }
?>

    <form action="./login.php" method="post">
        <div class="swapper mt-5 p-4">
            <h1 class="text-danger fs-3 text-center">ĐĂNG NHẬP</h1>
            <div class="mb-3">
                <label for=""><strong>Tên tài khoản(*)</strong></label></br>
                <input class="from-control" type="text" name="username" placeholder="Tên đăng nhập hoặc email" required>
            </div>
            <div class="mb-3">
                <label for=""><strong>Mật khẩu(*)</strong></label></br>
                <input class="from-control" type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="mb-3 text-end">
                <input class="btn btn-success" type="submit" value="Đăng nhập" name="DANGNHAP">
            </div>
            <div class="mb-3">
                <p>Chú ý: (*) bắt buộc phải điền thông tin</p>
                <?php if($error!=""):?>
                    <p class="text-danger"><?= $error; ?></p>
                <?php endif;?>
            </div>
        </div>
    </form>     
</body>
</html>