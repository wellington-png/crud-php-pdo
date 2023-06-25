<?php
    require_once dirname(dirname(__FILE__))."/DAO/DBConnection.php";
    require_once dirname(dirname(__FILE__))."/DAO/DAOInterface.php";


    class UserDAO implements DAOInterface{
        private $conn;
        
        public function __construct(){
            $db = DBConnection::getInstance();
            $this->conn = $db->getConnection();
        }

        public function insert($post){
            try{
                $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $stmt->bindParam(":name", $post->name);
                $stmt->bindParam(":email", $post->email);
                $stmt->bindParam(":password", $post->password);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function findAll(){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM users");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao obter as informações do usuário: ".$e->getMessage();
            }
        }

        public function findById($id){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao obter as informações do usuário: ".$e->getMessage();
            }
        }

        public function delete($id){
            try{
                $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao excluir: ".$e->getMessage();
            }
        }

        public function update($post){
            try{
                $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id");
                $stmt->bindParam(":name", $post->name);
                $stmt->bindParam(":email", $post->email);
                $stmt->bindParam(":password", $post->password);
                $stmt->bindParam(":role", $post->role);
                $stmt->bindParam(":id", $post->id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao atualizar: ".$e->getMessage();
            }
        }

        public function count(){
            try{
                $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM users");
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao obter as informações do usuário: ".$e->getMessage();
            }
        }

        public function findByEmail($email){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao obter as informações do usuário: ".$e->getMessage();
            }
        }
        

    }
?>