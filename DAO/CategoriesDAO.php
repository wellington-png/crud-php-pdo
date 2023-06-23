<?php
    require_once dirname(dirname(__FILE__))."/DAO/DBConnection.php";
    require_once dirname(dirname(__FILE__))."/DAO/DAOInterface.php";

    class CategoriesDAO  implements DAOInterface{
        private $conn;

        public function __construct(){
            $db = DBConnection::getInstance();
            $this->conn = $db->getConnection();
        }

        public function insert($categoria){
            try{
                $stmt = $this->conn->prepare("INSERT INTO categories (name, slug, description, parent_id) VALUES (:name, :slug, :description, :parent_id)");
                $stmt->bindParam(":name", $categoria->name);
                $stmt->bindParam(":slug", $categoria->slug);
                $stmt->bindParam(":description", $categoria->description);
                $stmt->bindParam(":parent_id", $categoria->parent_id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }
        public function findAll(){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM categories");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function findById($id){
            try{
                $stmt = $this->conn->prepare("SELECT * FROM categories WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function update($categoria){
            try{
                $stmt = $this->conn->prepare("UPDATE categories SET name = :name, slug = :slug, description = :description, parent_id = :parent_id WHERE id = :id");
                $stmt->bindParam(":name", $categoria->name);
                $stmt->bindParam(":slug", $categoria->slug);
                $stmt->bindParam(":description", $categoria->description);
                $stmt->bindParam(":parent_id", $categoria->parent_id);
                $stmt->bindParam(":id", $categoria->id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function delete($id){
            try{
                $stmt = $this->conn->prepare("DELETE FROM categories WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function count(){
            try{
                $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM categories");
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }
    
    }
?>