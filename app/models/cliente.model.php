<?php

class ClienteModel {

    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_showroom;charset=utf8mb4', 'root', '');
    }

    public function getClientes(){
        $query= $this->db->prepare("SELECT * FROM cliente");
        $query->execute();        
        $clientes= $query->fetchAll (PDO::FETCH_OBJ);
        return $clientes;
    }

    public function getCliente($id){
        $query= $this->db->prepare("SELECT * FROM cliente WHERE id= ?");
        $query->execute([$id]);        
        $cliente= $query->fetch(PDO::FETCH_OBJ);
        return $cliente;
    }  

    public function insertCliente($nombre, $apellido, $dni, $email) {
        $query = $this->db->prepare("INSERT INTO cliente (nombre, apellido, dni, email) VALUES (?, ?, ?, ?)");
        $query->execute([$nombre, $apellido, $dni, $email]);
        return $this->db->lastInsertId();
    }

    
    public function editCliente($cliente){
        $query= $this->db->prepare("UPDATE cliente SET nombre= ? , apellido= ? , dni= ? , email= ?  WHERE id= ?");
        try{
            $query->execute([$cliente->nombre, $cliente->apellido, $cliente->dni, $cliente->email,  $cliente->id]);
        }
        catch(PDOException $e){
            var_dump($e);
        }
    }    

    public function deleteClienteById($id) {
        $query = $this->db->prepare('DELETE FROM cliente WHERE id = ?');
        $query->execute([$id]);
    }

}
?>