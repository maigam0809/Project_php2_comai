<?php
namespace App\Core;
use App\Controllers\Admin\HomeController;

class App
{
    // protected $controller = 'Home' . 'Controller';
    // protected $action = 'index';
    // protected $params = [];

    public function __construct()
    {

        
    $url = isset($_GET['url']) == true ? $_GET['url'] : '/';
    $arrPath = explode("/", $url);

    switch ($arrPath[0]){
        case "/":
            echo "Đây là trang chủ phía fronend";
            break;
        case "about":
            $ctr = new HomeController();
            echo $ctr->about();
            break;
        case "admin":
            // kiểm tra nếu có $url[1] thì switch case tiếp
            // nếu không có thì tạo $url[1] = "/"
            $cPath = isset($arrPath[1]) ? $arrPath[1]: '/';
            switch($cPath){
                case "/":
                    $ctr = new HomeController();
                    echo $ctr->index();
                break;
                case "category":
                    $ctr = new CategoryController();
                    echo $ctr->index();
                break;
            }
        break;
        default:
            echo " Lỗi";
        break;
    }
        // $arr = $this->UrlProcess();
        // // die;
        // if (!empty($arr) && $arr[0] == 'admin') {

        //     if (isset($arr[1]) && file_exists('./app/controllers/admin/' . $arr[1] . '.php')) {
        //         $this->controller = $arr[1] . 'Controller';
        //         unset($arr[1]);
        //         unset($arr[0]);
        //     }

        //     // nhìn a code mẫu này;
        //     // cái này chưa có composer autoload nên vẫn phải require
        //     $linkRequire = "./app/controllers/admin/" . $this->controller  . ".php";
        //     require_once $linkRequire;

// trước a chả giải thích mãi ở đây . gọi đến class nào mà ko use namespace thì phải thêm nó vào
            // cái quan trọng là cái dòng này này
            
        //     $controllerWithNS = "App\Controllers\Admin\\$this->controller";

        //     $this->controller = new $controllerWithNS();
        //     if (isset($arr[2])) {
        //         if (method_exists($this->controller, $arr[2])) {
        //             $this->action = $arr[2];
        //         } else {
        //             $this->action = 'error';
        //         }
        //         unset($arr[2]);
        //     }
        //     //xử lý params
        //     $this->params = $arr ? array_values($arr) : [];
        //     // gọi hàm ra
        //     call_user_func_array([$this->controller, $this->action], $this->params);
        } 
        // else {
        //        if(!empty($arr) && file_exists('./app/controllers/client/'. $arr[0] .'.php')){
        //           $this->controller = $arr[0];
        //           unset($arr[0]);
        //        }
        //        require_once "./app/controllers/client/". $this->controller .".php";
        //        $this->controller = new $this->controller; 
        //        // xử lý action
        //        if(isset($arr[1])){
        //            if(method_exists($this->controller, $arr[1])){
        //                $this->action = $arr[1];
        //            }
        //            unset($arr[1]);
        //        }
        //        // xử lý params
        //        $this->params = $arr?array_values($arr):[];
        //        // gọi hàm ra
        //        call_user_func_array([$this->controller, $this->action], $this->params);
        // }
    }

    public function UrlProcess()
    {
        
        if (isset($_GET['url'])) {
            
             return explode('/', filter_var(trim($_GET['url'], '/')));
            // đảm bảo url không chứa dấu cách, ký tự đặc biệt
        }
    }

}

// cái file app này thật ra nhiệm vụ của nó chỉ là điều hướng thôi. 
// ngày trước e chưa học namespace thì phải dùng kiểu này 
// require_once "./app/controllers/client/". $this->controller .".php";
// nhưng giờ dùng rồi thì cứ switchcase thôi
// hoặc nếu e vẫn muốn dùng thì e phải chỉnh lại
