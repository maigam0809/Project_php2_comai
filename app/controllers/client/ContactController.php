<?php
namespace App\Controllers\Client;

use App\Core\Session;
use App\Core\Controller;
use App\Models\Contact;
use App\Models\Category;
use App\Models\InfoShop;

class ContactController extends Controller{

    function index(){
        $categories = Category::all();
        $info_shop1 = InfoShop::all();
        $info_shop = $info_shop1[0];

        $this->fe_content = VIEW_URL."/client/sites/contact.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        
        $this->view_fe('main/index',[
            'info_shop'=>$info_shop,
            'categories'=>$categories,
        ]);
    }

    public function store($request){
        $session = new Session();
        $message = "";
        $data = $request;
        $model = new Contact();
        $model->insert($data);
       
        $data['contact'] = "
        <p><strong>Kh&aacute;ch h&agrave;ng :</strong> " . $data['name'] . "</pre>

        <p><strong>Nội dung :</strong></p>
        
        <p>" . $data['contact'] . "</p>";

            if($message == 'flase'){

              
                $message = 'Gửi thất bại';
                $session->setFlashError($message);
                
            }else{
                $message = 'Gửi liên hệ thành công';
                $session->setFlashSuccess($message);
            }

        if ($data['email'] != "dunvph10007@fpt.edu.vn") {
            $data['email'] = 'dunvph10007@fpt.edu.vn';
        }
         $this->sentEmail('dunvph10007@fpt.edu.vn', $data['contact'], $data['email'], '', '', 'Liên hệ');

        $session->setFlashSuccess($message);
        header('Location: contact');
        exit();
        
    }
    
  

}
?>