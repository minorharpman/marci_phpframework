<?php 

namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';

use PDO;
use PDOException;

class PostRepository extends Repository
{
    private $table = 'article';

    protected $db;

    private $returnType;    

    public function __construct()
    {
        $connString = sprintf('mysql:host=%s;dbname=%s;charset=utf8', DB_HOST, DB_DATABASE);
        try {
            $this->db = new \PDO($connString, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Hiba kezelés
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }

        $this->returnType = PDO::FETCH_ASSOC;

    }

   /* public function getAllPosts() {
        $sql = "SELECT * FROM article";
        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll($this->returnType);
        return $results ?: [];
    }
    */

    public function getAllPosts() {
        $sql = "SELECT `id`, `title`, `author_id`, `summary`, `created_at` FROM article"; // Csak a szükséges oszlopokat kéri le
        $stmt = $this->db->query($sql);
        $results = $stmt->fetchAll($this->returnType);
        return $results ?: []; // Ha nincs eredmény, üres tömbbel tér vissza
    }
   

    public function getById($id)
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }
    
    //Cikk létrehozása

    public function create($data)
    {
        $sql = "INSERT INTO $this->table (`title`, `author_id`, `summary`, `articleText`, `category`, `created_at`, `updated_at` ) VALUES (:title, :author_id, :summary, :articleText, :category, NOW(), NOW())";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'summary' => $data['summary'],
            'articleText' => $data['articleText'],
            'category' => $data['category']
        ]);

        if ($success) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
 

//Cikk szerkesztése

public function update($article)
    {
        $sql = "
        UPDATE 
            `%s` 
        SET 
            `title` = :title, 
            `author_id` = :author_id, 
            `summary` = :summary, 
            `articleText` = :articleText, 
            `category` = :category, 
            `updated_at` = NOW()
        WHERE 
            `id` = :id
        ";
        $sql = sprintf($sql, $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $article['id'],
            'title' => $article['title'],
            'author_id' => $article['author_id'],
            'summary' => $article['summary'],
            'articleText' => $article['articleText'],
            'category' => $article['category']
        ]);
        return $this->getById($article['id']);
    }

//Cikk törlése

public function delete($id)
{
    $sql = sprintf('DELETE FROM `%s` WHERE `id` = :id', $this->table);
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
}

}   