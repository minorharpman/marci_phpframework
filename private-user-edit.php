<?php   

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PrivateUserController.php';

use Controllers\PrivateUserController;
$controller = new PrivateUserController();
$controller->edit();