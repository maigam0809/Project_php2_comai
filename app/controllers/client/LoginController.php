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
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['password'] = "/^[a-z0-9]{6,}$/i";
        

        if (Validator::isNull($data['email']) && trim($data['email']) == "") {
            $err['email'] = 'Không được bỏ trống email !';
        }

        if (Validator::isNull($data['password']) && trim($data['password']) == "") {
            $err['password'] = 'Không được bỏ trống';
        } elseif (strlen($data['password']) <= '6') {
            $err['password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
        }
        elseif(!preg_match("#[0-9]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chứa ít nhất một số !";
        }
        elseif(!preg_match("#[A-Z]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chứa ít nhất một chữ hoa";
        }
        elseif(!preg_match("#[a-z]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chưa ít nhất một chữ thường!";
        }
        
        if (!array_filter($err)) {

            $user= User::where(['email','=',$data['email']])->first();
            
            if ($user != false) {
                if ($user->password == $data['password']) {

                    $_SESSION["user"] = $user;

                    // var_dump($_SESSION["user"]);
                    // die;
                    $message = "Đăng nhập thành công!";
                    // $session->setFlashSuccess($message);
                    // $session->setFormState($_REQUEST);

                    // Khi đăng nhập thành công thì chuyển về trang home
                    header("location:".BASE_URL."/home");
                } else {
                    // Khồn đúng mật khẩu thì báo sai mật khẩu và báo đăng nhập thất bại
                    $message = 'Đăng nhập thất bại';
                    $session->setFlashError($message);
                    $err['password'] = "Mật khẩu không đúng!";
                    $session->setFormState($_REQUEST);
                    $session->setFormError($err);
                    header('Location: ./login');
                    exit;
                }
            } 
            else {
                // Khi không tồn tại tài khoản bằng cách xác định email 
                // thì báo không đăng nhập được và không tồn tại tài khoản
                $message = 'Đăng nhập thất bại';
                $session->setFlashError($message);
                $err['email'] = "Tài khoản này không tồn tại !";
                $session->setFormError($err);
                $session->setFormState($_REQUEST);
                header('Location: ./login');
                exit;

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

    function detail($id){
        $categories = Category::all();
        $userId = User::find($id);
        $this->fe_content = VIEW_URL."/client/sites/info_user.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        $this->view_fe('main/index', [
            'categories'=>$categories,
            'userId'=>$userId,
        ]);
    }

    function update($id){
        // echo "okok";
        // die;
        $session = new Session();
        $model = User::find($id);
        $data = $_POST;
        // var_dump($data);
        // die;

        $err = [
            'user_name' => '',
            'image' => '',
            'email' => '',
            'phone' => '',
            'address' => ''
        ];
        
        
        $pattern['user_name'] = "/^[A-Z0-9_]{3,25}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['phone'] = "/^(\+84|0){1}+[0-9]{8,9}$/i";

       

        
        if (Validator::isNull($data['user_name']) && trim($data['user_name']) == "") {
            $err['user_name'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['user_name'], $data['user_name']) == 0) {
            $err['user_name'] = "Nhập giống định dạng : maigam";
        }

        if (Validator::isNull($data['email']) && trim($data['email']) == "") {
            $err['email'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['email'], $data['email']) == 0) {
            $err['email'] = "Nhập email định dạng: abc@gmail.com";
        }
        
        // Kiểm tra xem nó đã tồn tại cái email này hay chưa
        $user_email = User::getAtributesWhere(['email','id'],'email',$data['email'])->get();
        if($data['email'] == $user_email[0]->email && $data['id'] != $user_email[0]->id){
            $err['email'] = 'Email này đã tồn tại !';
        }

    

        if (Validator::isNull($data['phone']) && trim($data['phone']) == "") {
            $err['phone'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['phone'], $data['phone']) == 0) {
            $err['phone'] = "Nhập phone định dạng: có đầu 0 hoặc +84 "; 
        }

        if (Validator::isNull($data['address']) && trim($data['address']) == "") {
            $err['address'] = 'Không được bỏ trống';
        }
        
            

        $nameImage = 'image';

        if (!Validator::isEmptyFile($nameImage) && 
            Validator::notImage($nameImage)
        ){
            $err[$nameImage] = 'Không đúng định dạng image';
        } 

        if (!array_filter($err)) {

            if(!Validator::isEmptyFile($nameImage)) {
                $up_hinh = $this->save_file($nameImage, IMAGE_BE."/user/");
                $image = strlen($up_hinh) > 0 ? $up_hinh : $cate_image;
                $data['image'] = $image;
            }

            echo $model->update($data);
            $message = 'Sửa thành công';
            $session->setFlashSuccess($message);
            header("Location:" .BASE_URL."/home");
            exit();

        } else {
            $message = 'Sửa thất bại';
            $session->setFlashError($message);
            $session->setFormState($_REQUEST);
            $session->setFormError($err);
            header("location:".BASE_URL."/info_user/".$id);
          
        }
    }

    function register(){

        $categories = Category::all();
        
        $this->fe_content = VIEW_URL."/client/sites/register.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";

        $this->view_fe('main/index', [
            'categories'=>$categories,
        ]);
    }

    function register_store($request){
        $session = new Session();
        $err = [
            'user_name' => '',
            'image' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
            'password2' => '',
            'address' => ''
        ];
        
        $data = $request;

        $pattern['user_name'] = "/^[A-Z0-9_]{3,25}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['password'] = "/^[a-z0-9]{6,}$/i";
        // $pattern['phone'] = "/^[0]{1}[0-9]{9,10}$/i";
        $pattern['phone'] = "/^(\+84|0){1}+[0-9]{8,9}$/i";

     
        
        if (Validator::isNull($data['user_name']) && trim($data['user_name']) == "") {
            $err['user_name'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['user_name'], $data['user_name']) == 0) {
            $err['user_name'] = "Nhập giống định dạng : maigam";
        }

        if (Validator::isNull($data['email']) && trim($data['email']) == "") {
            $err['email'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['email'], $data['email']) == 0) {
            $err['email'] = "Nhập email định dạng: abc@gmail.com";
        }

        $user_email = User::where(['email','=',$data['email']])->get();

       if($user_email > 0 ){
           if($data['email'] === $user_email){
               $err['email'] = 'Tài khoản này đã tồn tại';
           }

       }


        if (Validator::isNull($data['phone']) && trim($data['phone']) == "") {
            $err['phone'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['phone'], $data['phone']) == 0) {
            $err['phone'] = "Nhập phone định dạng: có đầu 0"; 
        }

        if (Validator::isNull($data['address']) && trim($data['address']) == "") {
            $err['address'] = 'Không được bỏ trống';
        }
        
        if (Validator::isNull($data['password']) && trim($data['password']) == "") {
            $err['password'] = 'Không được bỏ trống';
        } elseif (strlen($data['password']) <= '6') {
            $err['password'] = "Mật khẩu phải chứa ít nhất 6 kí tự!";
        }
        elseif(!preg_match("#[0-9]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chứa ít nhất một số !";
        }
        elseif(!preg_match("#[A-Z]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chứa ít nhất một chữ hoa";
        }
        elseif(!preg_match("#[a-z]+#",$data['password'])) {
            $err['password'] = "Mật khẩu phải chưa ít nhất một chữ thường!";
        }

        if (Validator::isNull($data['password2']) && trim($data['password2']) == "") {
            $err['password2'] = 'Không được bỏ trống';
        }elseif($data['password2'] != $data['password']){
            $err['password2'] = 'Nhập lại mật khẩu không khớp';
        }

        
        $nameImage = 'image';
        
        if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'Khong phai image';
        }

        if (!array_filter($err)) {
            unset($data['password2']);
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/user/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            
            echo password_hash($data['password'], PASSWORD_DEFAULT);
            // die;
            
            $model = new User();
            $model->insert($data);
            $message = 'Đăng ký tài khoản thành công. Mời bạn nhập đăng nhập !';
            $session->setFlashSuccess($message);
            header('Location: login');
            exit();

        } else {
            $message = 'Đăng ký tài khoản thất bại';
            $session->setFlashError($message);
            $session->setFormState($_REQUEST);
            $session->setFormError($err);
            header("location:".BASE_URL."/register");
            exit;
        }
       
    }


}
?>