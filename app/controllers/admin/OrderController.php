<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\Order;

class OrderController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/order/list.php";
        $orders = Order::joinUser()->get();
        $this->view('order/index',[
            'orders' => $orders,
        ]);
    }

    public function edit($id){
        $this->be_content = "./app/views/admin/order/edit.php";
        $orderId = Order::find($id);
        $this->view('order/index',[
            'orderId' =>$orderId,
        ]);
    }

    public function update($id){
        $session = new Session();
        $model = Order::find($id);
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
        echo Order::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }

    function detail($id){
        $this->be_content = "./app/views/admin/order/detail.php";
        // var_dump($id);die;
        $orderId = Order::find($id);
        var_dump($orderId);
        die;
        $this->view('order/index',[
            'orderId' =>$orderId,
        ]);

    }
}