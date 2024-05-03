<?php 

namespace Repositories;

class Repository
{
    protected $db;

    private $table;

    private $returnType = null;

    public function __construct()
    {
        $connString = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
        $this->db = new \PDO($connString, DB_USER, DB_PASS);
        $this->returnType = \PDO::FETCH_ASSOC;
    }

    public function __destruct()
    {
        $this->db = null;
    }
}