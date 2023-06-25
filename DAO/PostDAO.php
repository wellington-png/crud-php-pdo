<?php
require_once dirname(dirname(__FILE__)) . "/DAO/DBConnection.php";
require_once dirname(dirname(__FILE__)) . "/DAO/DAOInterface.php";


class PostDAO  implements DAOInterface
{
    private $conn;

    public function __construct()
    {
        $db = DBConnection::getInstance();
        $this->conn = $db->getConnection();
    }

    public function insert($post)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO posts (user_id, category_id, title, slug, content, excerpt, image, status) VALUES (:user_id, :category_id, :title, :slug, :content, :excerpt, :image, :status)");
            $stmt->bindValue(":title", $post->title);
            $stmt->bindValue(":content", $post->content);
            $stmt->bindValue(":excerpt", $post->excerpt);
            $stmt->bindValue(":image", $post->image);
            $stmt->bindValue(":status", $post->status);
            $stmt->bindValue(":user_id", $post->user_id);
            $stmt->bindValue(":category_id", $post->category_id);
            $stmt->bindValue(":slug", $post->slug);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    }

    public function update($post)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
            $stmt->bindParam(":title", $post->title);
            $stmt->bindParam(":content", $post->content);
            $stmt->bindParam(":id", $post->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao deletar: " . $e->getMessage();
        }
    }

    public function findAll()
    {
        // try {
            $stmt = $this->conn->prepare("SELECT * FROM posts");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        // } catch (PDOException $e) {
        //     echo "Erro ao listar: " . $e->getMessage();
        // }
    }


    public function findById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        }
    }

    public function findByTitle($title)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM posts WHERE title LIKE :title");
            $stmt->bindValue(":title", "%" . $title . "%");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        }
    }
    public function count()
    {
        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM posts");
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao obter numero de registros: " . $e->getMessage();
        }
    }

    public function paginate($page = 1, $total = 10)
    {
        if ($total > 50) {
            $total = 50;
        }
        
        $offset = ($page - 1) * $total;
        
        try {
            $stmt = $this->conn->prepare("SELECT * FROM posts LIMIT :total OFFSET :offset");
            $stmt->bindParam(":total", $total, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        }
    }

    public function getTreding()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM posts ORDER BY views DESC LIMIT 5");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao listar: " . $e->getMessage();
        }
    }
}
