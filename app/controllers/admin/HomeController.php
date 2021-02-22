<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use App\Models\News;
use App\Models\Slider;
use App\Models\Supplier;

class HomeController extends Controller{

    function index(){
        $countCate = Category::count()->first();
        $countPro = Product::count()->first();
        $countUser = User::count()->first();
        $countNew = News::count()->first();
        $countSupp = Supplier::count()->first();
        $countSlide = Slider::count()->first();
        $countCmt = Comment::count()->first();
        
        $countCmtPro = Comment::tkComment()->get();

        $lietKeRole = User::lietKeRole()->get();
        $thong_ke_hang_hoa = Product::thong_ke_hang_hoa()->get();
        // echo "<pre>";
        // var_dump($thong_ke_hang_hoa);
        // die;
      
        $this->view('main/index',[

            'countCate'=>$countCate,
            'countPro'=>$countPro,
            'countUser'=>$countUser,
            'countNew'=>$countNew,
            'countSupp'=>$countSupp,
            'countCmt'=>$countCmt,
            'countCmtPro'=>$countCmtPro,
            'countSlide'=>$countSlide,
            'lietKeRole'=>$lietKeRole,
            'thong_ke_hang_hoa'=>$thong_ke_hang_hoa,

        ]);
        
    }

}
?>