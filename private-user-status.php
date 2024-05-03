<?php

require_once 'Config/bootstrap.php';
require_once CONTROLLER_PATH . '/UserController.php';

use Controllers\UserController;

if(! isAdmin()){
    setFlashMessage('error', 'Nincs jogosultsága a megtekintéshez!');
    redirect(BASE_URL . '/admin-login.php');
}

$controller = new UserController();
$controller->statusChange();