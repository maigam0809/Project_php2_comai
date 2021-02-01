<?php
    use App\Core\Session;
    if(isset($data['suppliers'])){
        $supp = $data['suppliers'];
    }
    
    if(isset($data['suppliers'])){
        $suppId = $data['suppliers'];
    }

    // if(isset($data['items'])){
    //     $items = $data['items'];
    // }
   
    $session = new Session();
    $errors = $session->getFormError();
    $states = $session->getFormState();
    
    require_once "./app/views/admin/main/index.php";
?>
