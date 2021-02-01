<?php

use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\SuppController;
use App\Controllers\Admin\SliderController;
use App\Controllers\Admin\NewController;
use App\Controllers\Admin\UserController;
use App\Controllers\Admin\InfoController;
use App\Controllers\Admin\CommentController;

$url = isset($_GET['url']) == true ? $_GET['url'] : '/';
$arrPath = explode("/", $url);
// var_dump($arrPath[3]);
// die;

if ($arrPath[0] === 'admin') {
    // switch for admin
    $controllerPath = isset($arrPath[1]) ? $arrPath[1] : '/';
    switch ($controllerPath) {
        case "home":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch($actionPath){
                case 'index':
                    $ctr = new HomeController();
                    echo $ctr->index();
                break;
            }
           
        case "suppliers":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new SuppController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new SuppController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new SuppController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new SuppController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new SuppController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new SuppController();
                    echo $ctr->destroy($actionId);
                break;
             
            }
        break;
        // kết thúc nhà cung cấp

        case "category":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new CategoryController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new CategoryController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new CategoryController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new CategoryController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new CategoryController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new CategoryController();
                    echo $ctr->destroy($actionId);
                break;
               
            }
        break;
        // kết thúc phần loại hàng

        case "products":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new ProductController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new ProductController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new ProductController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new ProductController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new ProductController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new ProductController();
                    echo $ctr->destroy($actionId);
                break;
                case "detail":
                    $ctr = new ProductController();
                    echo $ctr->detail($actionId);
                break;
               
            }
        break;
        // kết thúc phần loại hàng

        case "sliders":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new SliderController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new SliderController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new SliderController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new SliderController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new SliderController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new SliderController();
                    echo $ctr->destroy($actionId);
                break;
                case "detail":
                    $ctr = new SliderController();
                    echo $ctr->detail($actionId);
                break;
               
            }
        break;
        // kết thúc phần quản lí hình ảnh

        case "news":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new NewController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new NewController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new NewController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new NewController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new NewController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new NewController();
                    echo $ctr->destroy($actionId);
                break;
                // case "detail":
                //     $ctr = new NewController();
                //     echo $ctr->detail($actionId);
                // break;
            }
        break;
        // kết thúc phần loại hàng

        case "info_shop":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new InfoController();
                    echo $ctr->index();
                    break;
                case "edit":
                    $ctr = new InfoController();
                    echo $ctr->edit($actionId);
                break;
                case "update":
                    $ctr = new InfoController();
                    echo $ctr->update($actionId);
                break;
            }
        break;
        // kết thúc info_shop

        case "users":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new UserController();
                    echo $ctr->index();
                    break;
                case "create":
                    $ctr = new UserController();
                    echo $ctr->create();
                    break;
                case "store":
                    $ctr = new UserController();
                    echo $ctr->store($_POST);
                    break;
                case "edit":
                    $ctr = new UserController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new UserController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new UserController();
                    echo $ctr->destroy($actionId);
                break;
                case "detail":
                    $ctr = new UserController();
                    echo $ctr->detail($actionId);
                break;
               
            }
        break;
        // kết thúc phần loại hàng

        case "comments":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new CommentController();
                    echo $ctr->index();
                    break;
                case "delete":
                    $ctr = new CommentController();
                    echo $ctr->destroy($actionId);
                break;
                case "detail":
                    $ctr = new CommentController();
                    echo $ctr->detail($actionId);
                break;
               
            }
        break;
        // kết thúc phần quản lí hình ảnh


        default:
        echo "Lỗi";
        break;
        
    }
} else {
    // switch for client
    $cPath = !empty($arrPath[0]) ? $arrPath[0] : '/';

    switch ($cPath) {
        case "/":
            $ctr = new UserController();
            echo $ctr->detail($actionId);
            echo "Đây là trang chủ phía fronend";
        break;
    }
}
