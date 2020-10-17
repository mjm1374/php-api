<?php

class Post
{
    private $conn;
    private $table = 'posts';

    public $id;
    public $category_id;
    public $category_name;
    public $ttile;
    public $body;
    public $author;
    public $ceated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET posts
    public function read()
    {
        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.author,
            p.created_at
        FROM
            ' . $this->table . ' p
        LEFT JOIN
            category c on p.catergory_id = c.id
        ORDER BY
            p.created_at DESC';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }
}
