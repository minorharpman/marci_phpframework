<?php   

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/DashboardController.php';

use Controllers\DashboardController;
$controller = new DashboardController();
$controller->index();