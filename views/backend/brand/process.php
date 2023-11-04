<?php

use App\Models\Brand;

function addtb($eroor)
{
    $eroor = "thêm ko thành công!";
    return $eroor;
}

if (isset($_POST['gui'])) {
    // Kiểm tra xem tên sản phẩm đã được nhập
    if (empty($_POST['name'])) {
        addtb($eroor);
        header("location:index.php?option=brand");
    } else {
        $brand = new Brand();

        $brand->name = $_POST['name'];
        $brand->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : "xlsau";
        $brand->description = $_POST['description'];
        $brand->status = $_POST['status'];
        $brand->image = $_FILES['image']['name'];

        // Thiết lập ngày tạo và người tạo (sử dụng người dùng hiện tại hoặc giá trị mặc định nếu không có phiên đăng nhập)
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

        // Lưu sản phẩm vào cơ sở dữ liệu
        $brand->save();
        $eroor = "Thêm sản phẩm thành công !!!";

        // Chuyển người dùng về trang danh sách sản phẩm sau khi thêm thành công
        header("location:index.php?option=brand");
    }
}
