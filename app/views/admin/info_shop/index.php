<?php

    use App\Core\Session;
    if(isset($data['info'])){
        $info = $data['info'];
    }
    
    if(isset($data['infoId'])){
        $infoId = $data['infoId'];
    }
    
    // if(isset($data['err'])){
    //     $err = $data['err'];
    // }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
