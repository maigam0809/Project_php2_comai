<?php
namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
// use App\Models\InfoShop;
// use App\Models\Slider;
use App\Models\Supplier;

class HomeController extends Controller{

    function index(){

        $categories = Category::all();
        $top10 = Product::all();
        $takeHoaQuaSay = Product::takeId('hoa quả sấy')->get();
        $takeHoaQua = Product::takeId('hoa quả trong nước')->get();
        $takeDongLanh = Product::takeId('thịt các loại')->get();
        $takeRauCu = Product::takeId('rau củ')->get();
        
        $this->fe_content = VIEW_URL."/client/sites/home.php";
        $this->menu = VIEW_URL."/client/layout/menu1.php";

        $this->view_fe('main/index',[
            'categories'=>$categories,
            'top10'=>$top10,
            'takeHoaQuaSay'=>$takeHoaQuaSay,
            'takeHoaQua'=>$takeHoaQua,
            'takeDongLanh'=>$takeDongLanh,
            'takeRauCu'=>$takeRauCu,

        ]);
    }

}
?>