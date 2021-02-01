<?php
    session_start();
    
    define('BASE_URL', "/assign_PHP2");// Đưỡng dẫn đến thư mục project
    define('VIEW_URL', './app/views'); // Đường dẫn hiển thị views
    define('CONTROLLER_URL', './app/controllers');// Đường dẫn hiển đến controllers
    define('MODEL_URL', './app/models'); // Đường dẫn đến Model
    //định nghĩa đường dẫn chứa ảnh sử dụng trong upload
    define('IMAGE_BE', $_SERVER["DOCUMENT_ROOT"] . BASE_URL . "/public/backend/image");

    // định nghĩa đường dẫn ảnh hiển thị
    define('IMGAE_DISPLAY', BASE_URL.'/public');

    // định nghĩa đường dẫn đến public client
    define('TOPUBLIC', BASE_URL.'/public/client');

    require_once "autoload.php";
    require_once "routes.php";
    // require_once "app/core/Validate.php";
    // require_once "app/core/Session.php";

?>