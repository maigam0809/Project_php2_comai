<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\User;

class UserController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/user/list.php";
        $users = User::all();
        $this->view('user/index',[
            'users' => $users,
        ]);
    }

    public function create(){
        $this->be_content = "./app/views/admin/user/create.php";
        $this->view('user/index',[

        ]);

    }

    public function store($request){
        $session = new Session();
        $err = [
            'user_name' => '',
            'image' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
            'address' => ''
        ];
        $data = $request;
        
        $pattern['user_name'] = "/^[a-z0-9_]{3,30}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['phone'] = "/^[0]{1}[0-9]{9,10}$/i";
        $pattern['password'] = "/^[a-z0-9]{6,}$/i";

     
        
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
        }else if (preg_match($pattern['password'], $data['password']) == 0) {
            $err['password'] = "Password có độ dài từ 6 trở lên"; 
        }
        
        
        
        
        $nameImage = 'image';

        if (Validator::isEmptyFile($nameImage)) {
            $err[$nameImage] = 'khong co image';
        } else if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'Khong phai image';
        }


        if (!array_filter($err)) {

          
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/user/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            
            $model = new User();
            var_dump($model->insert($data));
            // var_dump($data);
            // die;
            $message = 'Thêm thành công';
            $session->setFlashSuccess($message);
            header('Location: index');
            exit();

        } else {
            $message = 'Thêm thất bại';
            $session->setFlashError($message);
            $session->setFormState($_REQUEST);
            $session->setFormError($err);
            header('Location: create');
            exit;
        }
       
    }

    public function edit($id){
        $this->be_content = "./app/views/admin/user/edit.php";
        $userId = User::find($id);
        $this->view('user/index',[
            'userId' =>$userId,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = User::find($id);
        $data = $_POST;

        $err = [
            'user_name' => '',
            'image' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
            'address' => ''
        ];
        // check email tồn tại để thay đổi thông tin
       
        $pattern['user_name'] = "/^[a-z0-9_]{3,30}$/i";
        $pattern['email'] = "/^(\w+@\gmail)(\.\w{2,})$/i";
        $pattern['phone'] = "/^[0]{1}[0-9]{9,10}$/i";
        $pattern['password'] = "/^[a-z0-9]{6,}$/i";
        
        if (Validator::isNull($data['user_name']) && trim($data['user_name']) == "") {
            $err['user_name'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['user_name'], $data['user_name']) == 0) {
            $err['user_name'] = "Nhập giống định dạng : maigam";
        }

        if (Validator::isNull($data['email']) && trim($data['email']) == "") {
            $err['email'] = 'Không được bỏ trống';
        }else if (preg_match($pattern['email'], $data['email']) == 0) {
            $err['user_name'] = "Nhập email định dạng: abc@gmail.com";
        }
        
        // Kiểm tra xem nó đã tồn tại cái email này hay chưa
        $user_email = User::getAtributesWhere(['email','id'],'email',$data['email'])->get();
        if($data['email'] == $user_email[0]->email && $data['id'] != $user_email[0]->id){
            $err['email'] = 'Email này đã tồn tại !';
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
        }else if (preg_match($pattern['password'], $data['password']) == 0) {
            $err['password'] = "Password có độ dài từ 6 trở l"; 
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
            header('Location: ../index');
            exit();

        } else {
            $message = 'Sửa thất bại';
            $session->setFlashError($message);
            $session->setFormState($_REQUEST);
            $session->setFormError($err);
            header('Location: ../edit/'.$id);
          
        }

        

    }

    function destroy($id=0){
        $session = new Session();
        echo User::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}