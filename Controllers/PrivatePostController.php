<?php

namespace Controllers;
require_once 'Config/bootstrap.php';
require_once REPOSITORY_PATH . '/PostRepository.php';

class PrivatePostController
{
    // A nyitólap a cikkek listázásához
    
    public function index()
    {
        $postRepository = new \Repositories\PostRepository();
        $article = $postRepository->getAllPosts();
        
        view('private/posts/posts', ['article' => $article]);
    }
    
    // Cikk hozzáadása oldal megjelenítése
    public function create() {
        view('private/posts/create');
    }

    // Cikk mentése az adatbázisba (feldoglozó)
    public function store() {
        
        $postRepository = new \Repositories\PostRepository();
        
        $articleData = [
            'title' => $_POST['title'],
            'author_id' => $_POST['author_id'],
            'summary' => $_POST['summary'],
            'articleText' => $_POST['articleText'],
            'category' => $_POST['category']
        ];
        
        $result = $postRepository->create($articleData);
        
        if ($result) {
            $message = "A cikk sikeresen feltöltve.";
        } else {
            $message = "Hiba történt a cikk feltöltésekor.";
        }
        
        echo $message;

        view('private/posts/create', ['message' => $message]);
}



    // Cikk módosítása oldal megjelenítése
    public function edit()
    {
        
        // var_dump("adataim" , $_REQUEST );
        
        
        if(isset($_SESSION['form'])){
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        }else{
            if(! isset($_GET['id'])){
                setFlashMessage('danger', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-post-dashboard.php');
            } 

            $id = $_GET['id'];
           //  echo "ID: " . $id;

            $postRepository = new \Repositories\PostRepository();
            $article = $postRepository->getById($id);

            // var_dump("cikk" , $article);

            if(! $article){
                setFlashMessage('danger', 'Nincs ilyen azonosítójú cikk!');
                redirect(BASE_URL . '/private-post-dashboard.php');
            }
/*
            $form = [
                'id' => $article['id'],
                'title' => $article['title'],
                'author_id' => $article['author_id'],
                'summary' => $article['summary'],
                'articleText' => $article['articleText'],
                'category' => $article['category']
            ];
  */
        }

        view('private/posts/edit', ['article' => $article]);
    }

    // Cikk módosítása mentése az adatbázisba (feldoglozó)
    public function update($article)
    {
        $postRepository = new \Repositories\PostRepository();
        $article = $postRepository->update($article);
     
        echo "sikeresen módosítva!";   
        var_dump("módosított cikk" , $article);

        if(! $article) {
            $_SESSION['form'] = $article;
            setFlashMessage('danger', 'A felhasználó módosítása sikertelen!');
            redirect(BASE_URL . '/private-post-dashboard.php');
        }

        setFlashMessage('success', 'A felhasználó sikeresen módosítva!');
        redirect(BASE_URL . '/private-post-dashboard.php');
    }

    // Cikk törlése
    public function delete()
    {
        if(! isset($_GET['id'])){
            setFlashMessage('danger', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-post-dashboard.php');
        } 

        $id = $_GET['id'];
        $postRepository = new \Repositories\PostRepository();
        $article = $postRepository->getById($id);

        if(! $article){
            setFlashMessage('danger', 'Nincs ilyen azonosítójú felhasználó!');
            redirect(BASE_URL . '/private-post-dashboard.php');
        }

        $postRepository->delete($id);

        setFlashMessage('success', 'A felhasználó sikeresen törölve!');
        redirect(BASE_URL . '/private-post-dashboard.php');
    }
   
}
