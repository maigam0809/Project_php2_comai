<?php
namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;

class Ajaxcomment extends Controller
{   

    
    function index($request)
    {
        // var_dump($request);
        $data = $request;
        // echo "<br>";
        // var_dump($data['product_id']);
        // die;

        $commentajax="";

        // unset($_SESSION['commentajax']);
        $model = new Comment();
        $model->insert($data);
        
        $commentajax = Comment::get_cmt($data['product_id'],$data['user_id'],$data['content'])->first();
  
        echo "  
            <div class='media mb-4 pl-1 col-10' style='border-bottom: 0.2px solid #DDDDDD;'>

            <a class='media-left mr-3 ' href='#'>
                <img src='https://ui-avatars.com/api/?name=". $commentajax->user_name."'>
            </a>
            <div class='media-body'>

                <h6 class='media-heading user_name font-weight-bold'>".$commentajax->user_name."</h6>
                <p class='font-size-2' style='font-size: 14px;'>".$commentajax->content."</p>
            </div>

            <p class='pull-right'>
                <small>".$commentajax->created_at."</small>
            </p>
        </div>";


    }
     

}
