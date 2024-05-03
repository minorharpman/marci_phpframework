<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/PostRepository.php';

use Repositories\PostRepository;

class PublicPostController
{
    // A nyitólap a cikkek listázásához
    public function index() {
        $postRepository = new PostRepository();
        $posts = $postRepository->getAllPosts();
    
        echo "Posts count: " . count($posts); // Kiírja a cikkek számát
    
        //view('public/posts/index', ['posts' => $posts]);
        view('public/post/index', ['posts' => $posts]);
    }
    

    //Egy cikk megjelenítése
    public function show($id) {
        $postRepository = new PostRepository();
        $post = $postRepository->getById($id);
        view('public/post', ['post' => $post]); // Átadod az egyedi cikket
    }
}
 