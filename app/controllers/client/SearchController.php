<?php
namespace App\Controllers\Client;

use App\Core\Session;
use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller{

    function index($textSearch){

        // $pattern['name'] = "/([^\d]*)\s([^\d]*)/i";
        
        $takeSearch = Product::takeSearch($textSearch)->get();
        $categories = Category::all();
        $topView5 = Product::topView5()->get();

        $this->fe_content = VIEW_URL."/client/sites/search.php";
        $this->menu = VIEW_URL."/client/layout/menu2.php";
        
        $this->view_fe('main/index',[
            'takeSearch'=>$takeSearch,
            'categories'=>$categories,
            'topView5'=>$topView5,
            'request'=>$textSearch,
        ]);
    }

    
  

}
?>