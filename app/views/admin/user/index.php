<?php

    use App\Core\Session;
    if(isset($data['users'])){
        $users = $data['users'];
    }
    
    if(isset($data['userId'])){
        $userId = $data['userId'];
    }
    
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
