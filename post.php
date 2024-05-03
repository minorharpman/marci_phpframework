<?php

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PublicPostController.php';

use Controllers\PublicPostController;

$controller = new PublicPostController();
//$articles = $articles->getAllPosts();
var_dump($_GET);
$controller->show($_GET['id']);
