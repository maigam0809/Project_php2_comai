<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\Category;

class CategoryController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/cate/cate-list.php";
        $cates = Category::all();
        $this->view('cate/index',[
            'cate' => $cates,
        ]);
    }

    public function create(){
        $this->be_content = "./app/views/admin/cate/add-new.php";
        $this->view('cate/index',[
        ]);

    }

    public function store($request){
        $session = new Session();
        $err = [
            'name' => '',
            'image' => ''
        ];
        
        $pattern['name'] = "/([^\d]*)\s([^\d]*)/i";
        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }else if((preg_match($pattern['name'], $_POST['name']) == 0)){
            $err['name'] = "Loại hàng phải chứa ít nhất hai từ trở lên ";
        }
        
        $nameImage = 'image';

        if (Validator::isEmptyFile($nameImage)) {
            $err[$nameImage] = 'khong co image';
        } else if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'Khong phai image';
        }


        if (!array_filter($err)) {

            $data = $request;
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/categories/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            // var_dump($data);
            $model = new Category();
            $model->insert($data);
            $message = 'Thêm danh mục thành công';
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
        $this->be_content = "./app/views/admin/cate/edit.php";
        $cateId = Category::find($id);
        $this->view('cate/index',[
            'cate' =>$cateId,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = Category::find($id);
        $data = $_POST;

        $err = [
            'name' => '',
            'image' => ''
        ];
       

        $pattern['name'] = "/([^\d]*)\s([^\d]*)/i";
        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }else if((preg_match($pattern['name'], $_POST['name']) == 0)){
                $err['name'] = "Loại hàng phải chứa ít nhất hai từ trở lên ";
        }
            

        $nameImage = 'image';

        if (!Validator::isEmptyFile($nameImage) && 
            Validator::notImage($nameImage)
        ){
            $err[$nameImage] = 'Không đúng định dạng image';
        } 

        if (!array_filter($err)) {

            if(!Validator::isEmptyFile($nameImage)) {
                $up_hinh = $this->save_file($nameImage, IMAGE_BE."/categories/");
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
        echo Category::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}