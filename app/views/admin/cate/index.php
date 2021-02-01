<?php

    use App\Core\Session;
    if(isset($data['cate'])){
        $cateId = $data['cate'];
    }
    
    if(isset($data['cate'])){
        $cates = $data['cate'];
    }
    
    // if(isset($data['err'])){
    //     $err = $data['err'];
    // }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
