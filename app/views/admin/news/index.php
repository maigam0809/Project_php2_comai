<?php

    use App\Core\Session;
    if(isset($data['newId'])){
        $newId = $data['newId'];
    }
    
    if(isset($data['news'])){
        $news = $data['news'];
    }
    
    // if(isset($data['err'])){
    //     $err = $data['err'];
    // }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
