<?php
// IController.php
interface IController{
    public function index();
    public function create();
    public function store($object);
    public function edit($id);
    public function update($id);
    public function delete($id);
}


?>