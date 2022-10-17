<?php
require_once './app/models/producto.model.php';
require_once './app/views/producto.view.php';
require_once './app/models/cliente.model.php';
require_once './app/helpers/auth.Helper.php';

class ProductoController{

    private $model;
    private $view;
    private $authHelper;
    private $modelCliente;

    public function __construct () {
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
        $this->modelCliente = new ClienteModel();
        $this->authHelper = new AuthHelper();
    }

    public function showProductos(){
        session_start();
        $productos= $this->model->getProductosVendidos(); 
        $this->view->showProductosVendidos($productos);  
    }   
    
    public function showProductosById($id){
        session_start();
        $productos = $this->model->getProductos($id);
        $cliente = $this->modelCliente->getCliente($id);
        $this->view->showProductosById($productos,$cliente,$id);
    }

    

    public function addProducto($id){
        if(isset($_POST['producto'])&& isset($_POST['precio'])&& isset($_POST['fecha'])&& isset($_POST['deuda'])){
            $this->authHelper->checkLoggedIn();
            $producto= $_POST['producto'];        
            $precio= $_POST['precio'];
            $fecha= $_POST['fecha'];
            $deuda= $_POST['deuda'];
            $this->model->insertProducto( $id, $producto, $precio, $fecha, $deuda);
            header("Location: " . BASE_URL . 'showProductos/' . $id);
        }
        else{
            var_dump("Complete todos los datos");
            die();
        }
       
    }

    public function deleteProducto($id, $idForanea){
        $this->model->deleteProductoById($id);
        
        header("Location: " . BASE_URL . 'showProductos/' . $idForanea);
    }

    public function editarInfoProducto($id){
        $producto= $this->model->getProducto($id);
        $this->view->editarProducto($producto);   
    }

    public function editarProducto(){
        if(isset($_POST['producto'])&& isset($_POST['precio'])&& isset($_POST['fecha'])&& isset($_POST['deuda'])){
            $this->authHelper->checkLoggedIn();
            $producto= new stdClass();
            $cliente= $_POST['cliente'];
            $producto->id_producto= $_POST['id'];
            $producto->producto= $_POST['producto'];
            $producto->precio= $_POST['precio'];
            $producto->fecha= $_POST['fecha'];
            $producto->deuda= $_POST['deuda'];
            $this->model->editProducto($producto);
        
        
            header("Location: " . BASE_URL . 'showProductos/' . $cliente);
        }
        else{
            var_dump("Complete todos los datos");
            die();
        }

    }


}
?>