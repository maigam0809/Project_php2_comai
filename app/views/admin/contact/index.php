<?php

    use App\Core\Session;
    if(isset($data['contacts'])){
        $contacts = $data['contacts'];
    }
    
    if(isset($data['contactId'])){
        $cates = $data['contactId'];
    }
    
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
