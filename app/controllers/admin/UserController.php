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
        
        
        if (Validator::isNull($_POST['user_name']) && trim($_POST['user_name']) == "") {
            $err['user_name'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['email']) && trim($_POST['email']) == "") {
            $err['email'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['phone']) && trim($_POST['phone']) == "") {
            $err['phone'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['address']) && trim($_POST['address']) == "") {
            $err['address'] = 'Tên không được bỏ trống';
        }
        if (Validator::isNull($_POST['password']) && trim($_POST['password']) == "") {
            $err['password'] = 'Tên không được bỏ trống';
        }
        
        
        
        
        $nameImage = 'image';

        if (Validator::isEmptyFile($nameImage)) {
            $err[$nameImage] = 'khong co image';
        } else if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'Khong phai image';
        }


        if (!array_filter($err)) {

            $data = $request;
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/user/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            
            $model = new User();
            $model->insert($data);
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
        
        
        if (Validator::isNull($_POST['user_name']) && trim($_POST['user_name']) == "") {
            $err['user_name'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['email']) && trim($_POST['email']) == "") {
            $err['email'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['phone']) && trim($_POST['phone']) == "") {
            $err['phone'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['address']) && trim($_POST['address']) == "") {
            $err['address'] = 'Tên không được bỏ trống';
        }
        if (Validator::isNull($_POST['password']) && trim($_POST['password']) == "") {
            $err['password'] = 'Tên không được bỏ trống';
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