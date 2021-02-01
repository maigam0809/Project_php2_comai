<?php
namespace App\Controllers\Admin;

use App\Core\Validator;
use App\Core\Session;
use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller{
    
    public function index(){
        $this->be_content = "./app/views/admin/products/list.php";
        $products = Product::all();
        $cateNames = Category::getAtributes(['id','name'])->get();
        $this->view('products/index',[
            'products' => $products
        ]);
        
    }

    public function create(){
        $cateNames = Category::getAtributes(['id','name'])->get();
        $suppNames = Supplier::getAtributes(['id','name'])->get();
        $this->be_content = "./app/views/admin/products/pro-add.php";
        $this->view('products/index',[
            'cate' => $cateNames,
            'supp' => $suppNames
        ]);

    }

    public function store($request){
        $session = new Session();
        $err = [
            'name' => '',
            'image' => '',
            'description' => '',
            'price' => '',
            'sale' => '',
            'intro' => '',
        ];
        
        $pattern['name'] = "/([^\d]*)\s([^\d]*)/i";
        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }else if((preg_match($pattern['name'], $_POST['name']) == 0)){
            $err['name'] = "Loại hàng phải chứa ít nhất hai từ trở lên ";
        }

        if (Validator::isNull($_POST['sale'])) {
            $err['sale'] = 'không được bỏ trống';
        }elseif(($_POST['sale']) < 0){
                $err['sale'] = 'Không được phép âm';
        }

        if (Validator::isNull($_POST['price'])) {
            $err['price'] = 'Không được bỏ trống';
        }elseif(($_POST['price']) <= 0){
                $err['price'] = 'Không được phép âm';
        }
        if (Validator::isNull($_POST['intro'])) {
            $err['intro'] = 'Không được bỏ trống';
        }
        
        $nameImage = 'image';

        if (Validator::isEmptyFile($nameImage)) {
            $err[$nameImage] = 'khong co image';
        } else if(Validator::notImage($nameImage)) {
            $err[$nameImage] = 'Khong phai image';
        }


        if (!array_filter($err)) {

            $data = $request;
            $up_hinh = $this->save_file($nameImage, IMAGE_BE . "/products/");
            $data['image'] = strlen($up_hinh) > 0 ? $up_hinh : null;
            // var_dump($data);
            $model = new Product();
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
        $this->be_content = "./app/views/admin/products/edit.php";
        $proId = Product::find($id);
        $cateNames = Category::getAtributes(['id','name'])->get();
        $suppNames = Supplier::getAtributes(['id','name'])->get();
        $this->view('products/index',[
            'proId' =>$proId,
            'cate' =>$cateNames,
            'supp' =>$suppNames,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = Product::find($id);
        $data = $_POST;

        $err = [
            'name' => '',
            'image' => '',
            'description' => '',
            'price' => '',
            'sale' => '',
            'intro' => '',
        ];
        
        $pattern['name'] = "/([^\d]*)\s([^\d]*)/i";
        
        if (Validator::isNull($_POST['name']) && trim($_POST['name']) == "") {
            $err['name'] = 'Tên không được bỏ trống';
        }else if((preg_match($pattern['name'], $_POST['name']) == 0)){
            $err['name'] = "Loại hàng phải chứa ít nhất hai từ trở lên ";
        }

        if (Validator::isNull($_POST['sale'])) {
            $err['sale'] = 'không được bỏ trống';
        }elseif(($_POST['sale']) < 0){
                $err['sale'] = 'Không được phép âm';
        }

        if (Validator::isNull($_POST['price'])) {
            $err['price'] = 'Không được bỏ trống';
        }elseif(($_POST['price']) <= 0){
                $err['price'] = 'Không được phép âm';
        }
        if (Validator::isNull($_POST['intro'])) {
            $err['intro'] = 'Không được bỏ trống';
        }
            

        $nameImage = 'image';

        if (!Validator::isEmptyFile($nameImage) && 
            Validator::notImage($nameImage)
        ){
            $err[$nameImage] = 'Không đúng định dạng image';
        } 

        if (!array_filter($err)) {

            if(!Validator::isEmptyFile($nameImage)) {
                $up_hinh = $this->save_file($nameImage, IMAGE_BE."/products/");
                $image = strlen($up_hinh) > 0 ? $up_hinh : $pro_image;
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

    public function detail($id){
        $this->be_content = "./app/views/admin/products/detail.php";
        $proId = Product::find($id);
        $cateNames = Category::getAtributes(['id','name'])->get();
        $suppNames = Supplier::getAtributes(['id','name'])->get();
        $this->view('products/index',[
            'proId' =>$proId,
            'cate' =>$cateNames,
            'supp' =>$suppNames,
        ]);

    }

    public function destroy($id){
        $session = new Session();
        echo Product::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}   