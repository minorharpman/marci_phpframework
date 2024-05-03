<?php

namespace Controllers;

require_once REPOSITORY_PATH . '/UserRepository.php';
use Repositories\UserRepository;

class PrivateUserController

{
    // A szerzők listázásához
    public function index()
    {
        $userRepository = new UserRepository();
        $users = $userRepository->getAll();
        view('private/users/index', ['users' => $users]);
    }
    

    // Szerző hozzáadása oldal megjelenítése
    public function create()
{
    if(isset($_POST['name']) && isset($_POST['email'])) {
        // Ha az űrlap elküldésre került, akkor használjuk az űrlapról kapott adatokat
        $form = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'status' => 'active', // Alapértelmezett érték vagy bármi más, ami megfelel
        ];
    } else {
        // Ha az űrlap még nem lett elküldve, akkor használjunk alapértelmezett értékeket
        $form = [
            'name' => '',
            'email' => '',
            'status' => 'active', // Alapértelmezett érték vagy bármi más, ami megfelel
        ];
    }
    
    view('private/users/create', ['form' => $form]);
}
    // Szerző szerkesztése oldal megjelenítése

    public function edit()
    {
        if(isset($_SESSION['form'])){
            $form = $_SESSION['form'];
            unset($_SESSION['form']);
        }else{

            if(! isset($_GET['id'])){
                setFlashMessage('danger', 'Hiányzó azonosító!');
                redirect(BASE_URL . '/private-user.php');
            } 

            $id = $_GET['id'];

            $userRepository = new UserRepository();
            $user = $userRepository->getById($id);

            if(! $user){
                setFlashMessage('danger', 'Nincs ilyen azonosítójú felhasználó!');
                redirect(BASE_URL . '/private-user-edit.php');
            }

            $form = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'status' => $user['status'],
            ];
        }
        view('private/users/edit', ['form' => $form]);
    }

    //  Szerző mentése az adatbázisba (feldoglozó)
    public function store($post)
    {
       $userRepository = new UserRepository();
         $id = $userRepository->create($post);

            if($id){
                $_SESSION['form'] = $post;
                setFlashMessage('success', 'Sikeres mentés!');
                redirect(BASE_URL . '/private-users.php');

    }
}

    public function update($post)
    {
        $userRepository = new UserRepository();
        $user = $userRepository->update($post);

        if(! $user) {
            $_SESSION['form'] = $post;
            setFlashMessage('danger', 'A felhasználó módosítása sikertelen!');
            redirect(BASE_URL . '/private-user-edit.php?id=' . $post['id']);
        }

        setFlashMessage('success', 'A felhasználó sikeresen módosítva!');
        redirect(BASE_URL . '/private-user-edit.php');
    }
        


    //  Szerző törlése az adatbázisból
    public function delete()
    {
        if(! isset($_GET['id'])){
            setFlashMessage('danger', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-user.php');
        } 

        $id = $_GET['id'];

        $userRepository = new UserRepository();

        $user = $userRepository->getById($id);

        if(! $user){
            setFlashMessage('danger', 'Nincs ilyen azonosítójú felhasználó!');
            redirect(BASE_URL . '/private-user.php');
        }

        $userRepository->delete($id);

        setFlashMessage('success', 'A felhasználó sikeresen törölve!');
        redirect(BASE_URL . '/private-user.php');
    }
    
    // Szerző állapotának megváltoztatása

    public function statusChange()
    {
        if(! isset($_GET['id'])){
            setFlashMessage('danger', 'Hiányzó azonosító!');
            redirect(BASE_URL . '/private-user.php');
        } 

        $id = $_GET['id'];
        $status = $_GET['status'];

        $userRepository = new UserRepository();
        $user = $userRepository->getById($id);

        if(! $user){
            setFlashMessage('danger', 'Nincs ilyen azonosítójú felhasználó!');
            redirect(BASE_URL . '/private-user.php');
        }

        $status = $status == 'active' ? 'inactive' : 'active';
        $userRepository->statusChange($id, $status);

        setFlashMessage('success', 'A felhasználó állapota sikeresen megváltoztatva!');
        redirect(BASE_URL . '/private-user.php');
    }
}