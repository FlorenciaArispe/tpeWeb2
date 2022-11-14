<?php

class ProductoModel{
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_showroom;charset=utf8mb4', 'root', '');
    }

    public function getProductos($id){
        $query= $this->db->prepare("SELECT * FROM producto WHERE cliente= ?");
        $query->execute([$id]);
        
        $productos= $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;          
    }

    public function getProductosVendidos(){
        $query = $this->db->prepare("SELECT A. *, B. * FROM `cliente` A INNER JOIN `producto` B ON A.id = B.cliente");
        $query->execute();

        $productosVendidos = $query->fetchAll(PDO::FETCH_OBJ); 
        return $productosVendidos;
    }

    public function getProducto($id){
        $query= $this->db->prepare("SELECT * FROM producto WHERE id_producto= ?");
        $query->execute([$id]);        
        $producto= $query->fetch (PDO::FETCH_OBJ);
        return $producto;
    }
        
    public function insertProducto($id, $producto,$precio, $fecha, $deuda){
        $query = $this->db->prepare("INSERT INTO producto (cliente, producto, precio, fecha, deuda) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$id, $producto , $precio, $fecha, $deuda]);

        return $this->db->lastInsertId();
    }

    public function deleteProductoById($id){
        $query = $this->db->prepare('DELETE FROM producto WHERE id_producto = ?');
        $query->execute([$id]);
    }

    public function editProducto($producto){
        $query= $this->db->prepare("UPDATE producto SET producto= ? , precio= ? , fecha= ? , deuda= ?  WHERE id_producto= ?");
        try{
            $query->execute([$producto->producto, $producto->precio, $producto->fecha, $producto->deuda,  $producto->id_producto]);
        }
        catch(PDOException $e){
            var_dump($e);
        }
    }


}