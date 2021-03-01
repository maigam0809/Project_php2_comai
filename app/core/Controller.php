<?php
namespace App\Core;

class Controller {
    
    public $be_content = VIEW_URL."/admin/layouts/content.php";
    public $fe_content = VIEW_URL."/client/layouts/content.php";
    public $menu = VIEW_URL."/client/layout/menu2.php";
    
    // Hàm upload ảnh    
    public function save_file($name, $target){
        $file_uploaded = $_FILES[$name];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target . $file_name;
        if ($file_uploaded['size'] > 0) {
            move_uploaded_file($file_uploaded["tmp_name"], $target_path);
		}
        return $file_name;
    }

    // Function hiện view  bên admin
    public function view($view, $data=[]){
        $beContent = $this->be_content;
        require_once "./app/views/admin/".$view.".php";
    }

    // Function hiện View Client 
    public function view_fe($view, $data = []){
        $feContent = $this->fe_content;
        $menu = $this->menu;
        require_once "./app/views/client/".$view.".php";
    }

    public function sentEmail($e='', $pass='', $cus="", $mail ='', $phone ='jsdslkfjweopfjwepo', $content=''){
        //1. Key dưới đây chỉ dùng tạm, khi chạy dịch vụ chính thức bạn cần đăng ký tài khoản của sendgrid.com
        // website nhỏ thì dùng tài khoản miễn phí ok
        // tham khảo cách đăng ký để lấy key https://saophaixoan.net/search-tut?q=sendgrid
        // trong code này chỉ cần lấy key là ok, sau khi gửi thử xong thì verify là ok.
        $SENDGRID_API_KEY='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';
    
        // require '../../content/vendor/autoload.php'; d-n-m-u-1/public/sendmail-sendgrid/vendor/autoload.php
        require 'public/sendmail-sendgrid/vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail(); 
        ///------- bạn chỉnh sửa các thông tin dưới đây cho phù hợp với mục đích cá nhân
        // Thông tin người gửi
        $email->setFrom($e, "MiniMart");
        // Tiêu đề thư
        $email->setSubject("".$content."");
        // Thông tin người nhận
        $email->addTo($cus, "du040995");
        // Soạn nội dung cho thư
        // $email->addContent("text/plain", "Nội dung text thuần không có thẻ html");
        $email->addContent(
            "text/html", "<h2>$pass</h2>"
        );
    
        // tiến hành gửi thư
        $sendgrid = new \SendGrid($SENDGRID_API_KEY);
        try {
            $response = $sendgrid->send($email);
    
        } catch (Exception $e) {
            echo 'Email không tồn tại' ."\n";
        }
    
    }

    public function getCart($id){
        // $product = $this->model('proModel')->pro_select_by_id($id);
        if(isset($_POST['btn_cart'])){
            extract($_REQUEST);
            if(!empty($count)){
                $_SESSION['cart'][$id]=[
                    'product'=>$product,
                    'count'=>$count
                ];
            }else{
                $_SESSION['cart'][$id]=[
                    'product'=>$product,
                    'count'=>1
                ];
            }
        }
    }
    
}
