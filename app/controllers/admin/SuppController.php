<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\Supplier;

class SuppController extends Controller {


    public function index(){
        $this->be_content = "./app/views/admin/suppliers/list.php";
        $supp = Supplier::all();
        $this->view('suppliers/index',[
            'suppliers' => $supp,
        ]);
    }

    public function create(){
        $this->be_content = "./app/views/admin/suppliers/add.php";
        $this->view('suppliers/index',[
        ]);

    }

    public function store($request){
        $session = new Session();
        $err = [
            'name' => '',
            'image' => '',
            'description' => ''
        ];
        
        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }
        
        $nameImage = 'image';

        if (Validator::isEmptyFile($nameImage)) {
            $err[$nameImage] = 'Không có image';
        } else if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'không phải image';
        }

        if (Validator::isNull($_POST['description'])) {
            $err['description'] = 'Không được bỏ trống';
        }


        if (!array_filter($err)) {
            $data = $request;
            
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/suppliers/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
        
            $model = new Supplier();
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
        $this->be_content = "./app/views/admin/suppliers/edit.php";
        $suppId = Supplier::find($id);
        $this->view('suppliers/index',[
            'suppliers' =>$suppId
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = Supplier::find($id);
        $data = $_POST;

        $err = [
            'name' => '',
            'image' => '',
            'description' => ''
        ];
       

        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }
            
        if (Validator::isNull($_POST['description'])) {
            $err['description'] = 'Không được bỏ trống';
        }

        $nameImage = 'image';

        if (!Validator::isEmptyFile($nameImage) && 
            Validator::notImage($nameImage)
        ){
            $err[$nameImage] = 'Không đúng định dạng image';
        } 

        if (!array_filter($err)) {

            if(!Validator::isEmptyFile($nameImage)) {
                $up_hinh = $this->save_file($nameImage, IMAGE_BE."/suppliers/");
                $image = strlen($up_hinh) > 0 ? $up_hinh : $supplier_image;
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
        echo Supplier::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}