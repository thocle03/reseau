<?php

class PostController
{
    private $db;

    public function __construct()
    {
        $dbName = "reseau";
        $port = 3307;
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function create(Post $post)
    {
        var_dump($post);
        $req = $this->db->prepare("INSERT INTO `post` (title, content, author, create_at, url) VALUES(:title, :content, :author, :create_at, :url)");
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->bindValue(":url", $post->getUrl(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Post $post)
    {
        $req = $this->db->prepare("UPDATE `post` SET title = :title, content = :content, author = :author, create_at = :create_at, url = :url WHERE id = :id");
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":author", $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":create_at", date('Y-m-d H:i:s'));
        $req->bindValue(":url", $post->getUrl(), PDO::PARAM_STR);

        $req->execute();
    }

    public function delete(int $id): void
    {
        $req = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch();
        $post = new Post($donnees);
        return $post;
    }

    public function readAll()
    {
        $posts = [];
        $req = $this->db->query("SELECT * FROM `post`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $post = new Post($data);
            $posts[] = $post;
        }
        return $posts;
    }
}