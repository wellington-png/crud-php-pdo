<?php
    require_once dirname(dirname(__FILE__))."/DAO/DBConnection.php";
    require_once dirname(dirname(__FILE__))."/DAO/DAOInterface.php";


    class PostDAO  implements DAOInterface{
        private $conn;

        public function __construct(){
            $db = DBConnection::getInstance();
            $this->conn = $db->getConnection();
        }

        public function insert($post){
            try{
                $stmt = $this->conn->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
                $stmt->bindParam(":title", $post->title);
                $stmt->bindParam(":content", $post->content);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function update($post){
            try{
                $stmt = $this->conn->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
                $stmt->bindParam(":title", $post->title);
                $stmt->bindParam(":content", $post->content);
                $stmt->bindParam(":id", $post->id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao atualizar: ".$e->getMessage();
            }
        }

        public function delete($id){
            try{
                $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao deletar: ".$e->getMessage();
            }
        }

        public function findAll(){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM posts");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }catch(PDOException $e){
                echo "Erro ao listar: ".$e->getMessage();
            }
        }


        public function findById($id){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM posts WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo "Erro ao listar: ".$e->getMessage();
            }
        }

        public function findByTitle($title){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM posts WHERE title LIKE :title");
                $stmt->bindValue(":title", "%".$title."%");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }catch(PDOException $e){
                echo "Erro ao listar: ".$e->getMessage();
            }
        }
        public function count(){
            try{
                $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM posts");
                $stmt->execute();
                $result = $stmt->fetchColumn();
                return $result;
            }catch(PDOException $e){
                echo "Erro ao obter numero de registros: ".$e->getMessage();
            }
        }

        
    }
