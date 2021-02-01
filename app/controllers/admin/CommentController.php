<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\Comment;

class CommentController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/comment/list.php";
        $comments = Comment::joinUser()->get();
        $this->view('comment/index',[
            'comments' => $comments,
        ]);
    }

    public function detail($id){
        $this->be_content = "./app/views/admin/comment/detail.php";
        $commentId = Comment::find($id);
        $this->view('comment/index',[
            'commentId' => $commentId,
        ]);
    }

    function destroy($id){
        $session = new Session();
        echo Comment::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}