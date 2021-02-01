<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\News;

class NewController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/news/list.php";
        $news = News::all();
        $this->view('news/index',[
            'news' => $news,
        ]);
    }

    public function create(){
        $this->be_content = "./app/views/admin/news/add-new.php";
        $this->view('news/index',[
        ]);

    }

    public function store($request){
        $session = new Session();
        $err = [
            'name' => '',
            'image' => '',
            'description' => '',
            'detail' => '',
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

        if (Validator::isNull($_POST['description'])) {
            $err['description'] = 'Không được bỏ trống';
        }

        if (Validator::isNull($_POST['detail'])) {
            $err['detail'] = 'Không được bỏ trống';
        }


        if (!array_filter($err)) {

            $data = $request;
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/new/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            // var_dump($data);
            $model = new News();
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
        $this->be_content = "./app/views/admin/news/edit.php";
        $newId = News::find($id);
        $this->view('news/index',[
            'newId' =>$newId,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = News::find($id);
        $data = $_POST;

        $err = [
            'name' => '',
            'image' => '',
            'description' => '',
            'detail' => '',
        ];
       

        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }

        if (Validator::isNull($_POST['description'])) {
            $err['description'] = 'Không được bỏ trống';
        }

        if (Validator::isNull($_POST['detail'])) {
            $err['detail'] = 'Không được bỏ trống';
        }
            

        $nameImage = 'image';

        if (!Validator::isEmptyFile($nameImage) && 
            Validator::notImage($nameImage)
        ){
            $err[$nameImage] = 'Không đúng định dạng image';
        } 

        if (!array_filter($err)) {

            if(!Validator::isEmptyFile($nameImage)) {
                $up_hinh = $this->save_file($nameImage, IMAGE_BE."/new/");
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
        echo News::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}