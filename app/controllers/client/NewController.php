<?php
namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\Product;

class NewController extends Controller{

    function index(){
        $news = News::all();
        
        $this->fe_content = VIEW_URL."/client/sites/news.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        
        $this->view_fe('main/index',[
            'news'=>$news,
        ]);
    }
    
    function detail($id){
        $newId = News::find($id);
        $categories = Category::all();
        // $topView5 = Product::topView5()->get();

        $this->fe_content = VIEW_URL."/client/sites/new_detail.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        
        $this->view_fe('main/index',[
            'newId'=>$newId,
            'categories'=>$categories,
            // 'topView5'=>$topView5,
            

        ]);
    }

}
?>