<?php

// Trang Admin quản trị các danh mục người dùng
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\SuppController;
use App\Controllers\Admin\SliderController;
use App\Controllers\Admin\NewController;
use App\Controllers\Admin\UserController;
use App\Controllers\Admin\InfoController;
use App\Controllers\Admin\CommentController;
use App\Controllers\Admin\ContactController;
use App\Controllers\Admin\OrderController;

// Trang biểu hiển phía client
use App\Controllers\Client\HomeController as ClientHomeController;
use App\Controllers\Client\ProductController as ClientProductController;
use App\Controllers\Client\NewController as ClientNewController;
use App\Controllers\Client\ContactController as ClientContactController;
use App\Controllers\Client\SearchController;
use App\Controllers\Client\LoginController;
use App\Controllers\Client\ajaxcomment;

$url = isset($_GET['url']) == true ? $_GET['url'] : '/';
$arrPath = explode("/", $url);
// var_dump($arrPath[3]);
// die;
// var_dump($_GET);
// die;

if ($arrPath[0] === 'admin') {
    // switch for admin
    $controllerPath = isset($arrPath[1]) ? $arrPath[1] : '/';
    switch ($controllerPath) {
        case "home":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch($actionPath){
                case '/':
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
        // kết thúc phần users

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
        // kết thúc phần quản lí bình luận của sản phẩm

        
        case "contact":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new ContactController();
                    echo $ctr->index();
                    break;
                case "delete":
                    $ctr = new ContactController();
                    echo $ctr->destroy($actionId);
                break;
                case "detail":
                    $ctr = new ContactController();
                    echo $ctr->detail($actionId);
                break;
               
            }
        break;
        // Kết thúc quản lí liên hệ với khách hàng

        
        case "order":
            $actionPath = !empty($arrPath[2]) ? $arrPath[2] : '/';
            // Lấy id sau action
            $actionId = !empty($arrPath[3]) ? $arrPath[3] : '';
            switch ($actionPath) {
                case '/':
                case 'index':
                    $ctr = new OrderController();
                    echo $ctr->index();
                    break;
                case "detail":
                    $ctr = new OrderController();
                    echo $ctr->detail($actionId);
                    break;
                case "edit":
                    $ctr = new OrderController();
                    echo $ctr->edit($actionId);
                    break;
                case "update":
                    $ctr = new OrderController();
                    echo $ctr->update($actionId);
                    break;
                case "delete":
                    $ctr = new OrderController();
                    echo $ctr->destroy($actionId);
                break;
               
            }
        break;
        // kết thúc phần loại hàng

        default:
        echo "Lỗi";
        break;
        
    }
} else {
    // switch for client
    $cPath = !empty($arrPath[0]) ? $arrPath[0] : '/';
    $param = isset($arrPath[1]) ? $arrPath[1] : '/';
    switch ($cPath) {
        case "/":
        case "home":
            $ctr = new ClientHomeController();
            echo $ctr->index();
        break;
        case "info_shop":
            $ctr = new ClientHomeController();
            echo $ctr->info_detail();
        break;
        case "register":
            $ctr = new LoginController();
            echo $ctr->register();
        break;
        case "register_store":
            $ctr = new LoginController();
            echo $ctr->register_store($_POST);
        break;
        case "login":
            $ctr = new LoginController();
            echo $ctr->index();
        break;
        case "login_store":
            $ctr = new LoginController();
            echo $ctr->login($_POST);
        break;
        case "logout":
            $ctr = new LoginController();
            echo $ctr->logout();
        break;
        case "info_user":
            $ctr = new LoginController();
            echo $ctr->detail($param);
        break;
        case "user_store":
            $ctr = new LoginController();
            echo $ctr->update($param);
        break;

        case "product_detail":
            $ctr = new ClientProductController();
            echo $ctr->detail($param);
        break;
        case "ajaxcomment":
            $ctr = new Ajaxcomment();
            echo $ctr->index($_POST);
        break;
        case "product_type_sale":
            $ctr = new ClientProductController();
            echo $ctr->listCateId($param);
        break;
        case "product_ban_chay":
            $ctr = new ClientProductController();
            echo $ctr->banChayTop10();
        break;
        case "product_sale":
            $ctr = new ClientProductController();
            echo $ctr->sale();
        break;
        case "news":
            $ctr = new ClientNewController();
            echo $ctr->index();
        break;
        case "new_detail":
            $ctr = new ClientNewController();
            echo $ctr->detail($param);
        break;
        case "contact":
            $ctr = new ClientContactController();
            echo $ctr->index();
        break;
        case "store":
            $ctr = new ClientContactController();
            echo $ctr->store($_POST);
        break;
        case "search":
         
            $ctr = new SearchController();
            echo $ctr->index($param);
        break;
    }
}
