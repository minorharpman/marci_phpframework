<?php

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/PrivateUserController.php';

use Controllers\PrivateUserController;

$controller = new PrivateUserController();
$controller->store($_POST);
