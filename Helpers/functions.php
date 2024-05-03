<?php 

if(!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}

if(!function_exists('encrypt')) {
    function encrypt($string) {
       return hash('sha512', $string);
    }
}

if(!function_exists('view')) {
    function view($view, $data = []) {
        extract($data);
        include_once BASE_PATH . '/Templates/common/header.view.php';
        include_once BASE_PATH . '/Templates/common/topnavbar.view.php';
        include_once BASE_PATH . '/Templates/' . $view . '.view.php';
        include_once BASE_PATH . '/Templates/common/footer.view.php';
    }
}

if(!function_exists('redirect')) {
    function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}

if(!function_exists('json_response')) {
    function json_response(array $data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

if(!function_exists('json_post')) {
    function json_post() {
        $json = file_get_contents('php://input');
        return json_decode($json, true);
    }
}

if(!function_exists('getFlashMessage')) {
    function getFlashMessage(): array
     {
        if(isset($_SESSION['flash'])) {
            $message = $_SESSION['flash'];
            
            unset($_SESSION['flash']);
            return $flash;
        }

        return [];
    }
}

if(!function_exists('setFlashMessage')) {
    function setFlashMessage($type, $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}