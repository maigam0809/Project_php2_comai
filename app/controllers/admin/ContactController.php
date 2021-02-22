<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Validator;
use App\Core\Session;
use App\Models\Contact;

class ContactController extends Controller {

    public function index(){
        $this->be_content = "./app/views/admin/contact/list.php";
        $contacts = Contact::all();
        $this->view('contact/index',[
            'contacts' => $contacts,
        ]);
    }
    public function detail($id){
        $contactId = Contact::find($id);
        $this->be_content = "./app/views/admin/contact/detail.php";
        $this->view('contact/index',[
            'contactId' => $contactId,
        ]);
    }


    function destroy($id=0){
        $session = new Session();
        echo Contact::destroy($id);
        $message='Xóa thành công';
        $session->setFlashSuccess($message);
        header('Location:../index');
        exit();
    }
}