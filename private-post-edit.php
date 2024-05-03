<?php
// var_dump("adatok" , $_POST); 

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PrivatePostController.php';

use Controllers\PrivatePostController;
$controller = new PrivatePostController();
$controller->edit($_GET);