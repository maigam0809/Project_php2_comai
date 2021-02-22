<?php
namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\User;
use App\Models\Category;
use App\Core\Session;
use App\Core\Validator;


class LoginController extends Controller{

    function index(){
        $categories = Category::all();
        $this->fe_content = VIEW_URL."/client/sites/login.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";

        $this->view_fe('main/index', [
            'categories'=>$categories
        ]);

        
    }
    
    function logout(){
        session_start();
        session_destroy();
        header("location:".BASE_URL."/home");
    }

    function login($request){
        $session = new Session();

        unset($_SESSION['user_password']);

        $data = $request;
        $err =[
            'user_name' => '',
            'email' => '',
        ];

        if (Validator::isNull($data['email']) && trim($data['email']) == "") {
            $err['email'] = 'Không được bỏ trống email !';
        }

        if (Validator::isNull($data['password']) && trim($data['password']) == "") {
            $err['password'] = 'Không bỏ trống password !';
        }
        
        if (!array_filter($err)) {

            $user= User::where(['email','=',$data['email']])->first();
            
            if ($user != false) {
                if ($user->password == $data['password']) {

                    $message = "Đăng nhập thành công!";
                    $_SESSION["user"] = $user;\\s
                    header("location:".BASE_URL."/home");
                } else {
                    $message = "Mật khẩu không đúng!";
                    $session->setFlashError($message);
                }
            } 
            else {
                $message = 'Tài khoản không tồn tại !';
                $session->setFlashError($message);
               
            }
            
        }else{
            $message = 'Đăng nhập thất bại';
            $session->setFlashError($message);
            $session->setFormState($_REQUEST);
            $session->setFormError($err);
            header('Location: ./login');
            exit;
        }


    }


}
?>