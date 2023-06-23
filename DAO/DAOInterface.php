<?php

// DAOInterface implementation
interface DAOInterface{
    public function findAll();
    public function findById($id);
    public function insert($model);
    public function update($model);
    public function delete($id);
    public function count();
}





?>