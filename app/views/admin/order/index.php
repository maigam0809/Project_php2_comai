<?php

    use App\Core\Session;
    if(isset($data['orderId'])){
        $orderId = $data['orderId'];
    }
    
    if(isset($data['orders'])){
        $orders = $data['orders'];
    }
    
    // if(isset($data['err'])){
    //     $err = $data['err'];
    // }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
