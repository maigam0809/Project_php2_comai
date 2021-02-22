<?php
namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller{

    function listCateId($id){

        $categories = Category::all();
        $cate_id = Category::find($id);
        $proId = Product::takeCateId($id)->get();
        $topView5 = Product::topView5()->get();
     
     
        $this->fe_content = VIEW_URL."/client/sites/product_type.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        
        $this->view_fe('main/index',[
            'categories'=>$categories,
            'proId'=>$proId,
            'cate_id'=>$cate_id,
            'topView5'=>$topView5,
            

        ]);
    }

    function detail($id){
        $proId = Product::find($id);
        $categories = Category::all();
        $commentProId = Product::joinUserProId($id)->get();
     
        $this->fe_content = VIEW_URL."/client/sites/product_detail.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";

        $this->view_fe('main/index',[
            'categories'=>$categories,
            'proId'=>$proId,
            'commentProId'=>$commentProId,

        ]);
        
    }

}
?>