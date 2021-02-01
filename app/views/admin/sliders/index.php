<?php

    use App\Core\Session;
    if(isset($data['sliders'])){
        $sliders = $data['sliders'];
    }
    
    if(isset($data['slideId'])){
        $slideId = $data['slideId'];
    }
    
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    require_once "./app/views/admin/main/index.php";
?>
