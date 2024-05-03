<?php
namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';

class UserRepository extends Repository
{
    protected $table = 'user';
    protected $returnType = \PDO::FETCH_ASSOC; // Set the default fetch mode here

    public function __construct()
    {
        parent::__construct();
        // You can also set the returnType in the constructor if needed
        // $this->returnType = \PDO::FETCH_ASSOC;
    }

    public function getAll()
    {
        $sql = sprintf('SELECT `id`, `name`, `email`, `status`, `created_at` FROM `%s`', $this->table);
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll($this->returnType);
    }

    public function getById($id){
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }

    public function create($user)
    {
        $sql = "
        INSERT INTO 
            `%s` (
                `name`, `email`, `status`, `created_at`) 
            VALUES (
                :name, :email, :status, NOW()
            )
        ";
        $sql = sprintf($sql, $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'name' => $user['name'],
            'email' => $user['email'],
            'status' => 'active'
        ]);
        return $this->db->lastInsertId();
    }

    public function update($user)
    {
        $sql = "
        UPDATE 
            `%s` 
        SET 
            `name` = :name, `email` = :email, `status` = :status
        WHERE 
            `id` = :id
        ";
        $sql = sprintf($sql, $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'status' => $user['status']
        ]);
        return $this->getById($user['id']);
    }

// felhasználó törlése
    
    public function delete($id)
    {
        $sql = sprintf('DELETE FROM `%s` WHERE `id` = :id', $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function statusChange($id, $status)
    {
        $sql = sprintf('UPDATE `%s` SET `status` = :status WHERE `id` = :id', $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'status' => $status,
        ]);
    }
}
