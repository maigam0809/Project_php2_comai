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
    
}
