<?php

class Route
{
    public static function route_site()
    {
        $path = "views/frontend/";

        if (isset($_REQUEST["option"])) {
            $option = $_REQUEST["option"];
            $path .= $option;

            if (isset($_REQUEST["slug"])) {
                $path .= "-detail.php";
            } else {
                if (isset($_REQUEST["cat"])) {
                    $path .= "-category.php";
                } else {
                    $path .= ".php";
                }
            }
        } else {
            $path = "./views/frontend/home.php";
        }

        if (file_exists($path)) {
            require_once $path;
        } else {
            echo $path;
        }
    }

    public static function route_admin()
    {
        $path = "../views/backend/";

        if (isset($_REQUEST['option'])) {
            if ($_REQUEST['option'] === 'product_create') {
                $path .= 'product/product_create.php';
            } else if ($_REQUEST['option'] === 'product_show') {
                $path .= 'product/product_show.php';
            } else if ($_REQUEST['option'] === 'post_create') {
                $path .= 'post/post_create.php';
            } else if ($_REQUEST['option'] === 'user_create') {
                $path .= 'user/user_create.php';
            } else if ($_REQUEST['option'] === 'customer_create') {
                $path .= 'customer/customer_create.php';
            } else if ($_REQUEST['option'] === 'page_create') {
                $path .= 'page/page_create.php';
            } else if ($_REQUEST['option'] === 'banner_create') {
                $path .= 'banner/banner_create.php';
            } else if ($_REQUEST['option'] === 'contact_create') {
                $path .= 'contact/contact_create.php';
            } else if ($_REQUEST['option'] === 'page_create') {
                $path .= 'page/page_create.php';
            } else if ($_REQUEST['option'] === 'order_details') {
                $path .= 'order/order_details.php';
            } else if ($_REQUEST['option'] === 'addorder') {
                $path .= 'order/addorder.php';
            } else if ($_REQUEST['option'] === 'addcategory') { 
                $path .= 'category/addcategory.php';
            } else {
                $path .= $_REQUEST['option'] . '/';
                if (isset($_REQUEST['cat'])) {
                    $path .= $_REQUEST['cat'] . ".php";
                } else {
                    $path .= "index.php";
                }
            }
        } else {
            $path .= "dashboard/index.php";
        }
        require_once $path;
    }
}