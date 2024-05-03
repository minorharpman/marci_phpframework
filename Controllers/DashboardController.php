<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';
use Repositories\PostRepository;

class DashboardController
{
    public function index()
    {
        $postRepository = new PostRepository();
        $articles = $postRepository->getAllPosts(); 
        
       // var_dump($articles);
        $this->view('private/posts/posts', ['articles' => $articles]);
    }

    private function view($path, $data)
    {
        extract($data); 
        require_once TEMPLATE_PATH . "/$path.view.php";
    }
}
