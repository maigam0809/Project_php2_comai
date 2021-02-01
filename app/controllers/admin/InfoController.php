<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\InfoShop;

class InfoController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/info_shop/list.php";
        $info = InfoShop::all();
        $this->view('info_shop/index',[
            'info' => $info,
        ]);
    }

    public function edit($id){
        $this->be_content = "./app/views/admin/info_shop/edit.php";
        $infoId = InfoShop::find($id);
        $this->view('info_shop/index',[
            'infoId' =>$infoId,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = InfoShop::find($id);
        $data = $_POST;

        $err = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'detail' => '',
        ];
       

        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['email']) && trim($_POST['email']) == "") {
            $err['email'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['phone']) && trim($_POST['phone']) == "") {
            $err['phone'] = 'Tên không được bỏ trống';
        }
        if (Validator::isNull($_POST['detail']) && trim($_POST['detail']) == "") {
            $err['detail'] = 'Tên không được bỏ trống';
        }
            

     

        if (!array_filter($err)) {

            // if(!Validator::isEmptyFile($nameImage)) {
            //     $up_hinh = $this->save_file($nameImage, IMAGE_BE."/categories/");
            //     $image = strlen($up_hinh) > 0 ? $up_hinh : $cate_image;
            //     $data['image'] = $image;
            // }
            
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
}