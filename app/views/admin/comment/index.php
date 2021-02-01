<?php

    use App\Core\Session;
    
    if(isset($data['comments'])){
        $comments = $data['comments'];
    }
    
    if(isset($data['commentId'])){
        $commentId = $data['commentId'];
    }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
