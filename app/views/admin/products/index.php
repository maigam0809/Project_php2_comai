<?php

    use App\Core\Session;
    
    if(isset($data['products'])){
        $products = $data['products'];
    }
    if(isset($data['cate'])){
        $cateNames = $data['cate'];
    }
    if(isset($data['supp'])){
        $suppNames = $data['supp'];
    }

    if(isset($data['proId'])){
        $proId = $data['proId'];
    }
    
    $session = new Session();
    $states = $session->getFormState();
    $errors = $session->getFormError();
    require_once "./app/views/admin/main/index.php";
?>
