<?php

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PrivatePostController.php';

use Controllers\PrivatePostController;

$controller = new PrivatePostController();
$controller->index();