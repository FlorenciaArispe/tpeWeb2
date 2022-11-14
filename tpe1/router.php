<?php
require_once "app/controllers/cliente.controller.php";
require_once "app/controllers/producto.controller.php";
require_once "app/controllers/auth.controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} 

// parsea la accion 
$params = explode('/', $action);

// instancio el controller 

// tabla de ruteo
switch ($params[0]) {

    case 'login':
        $authController= new AuthController();
        $authController->showFormLogin();
        break;

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;

    case 'validate':
        $authController= new AuthController();
        $authController->validateUser();
        break;

    case 'list':
        $clienteController = new ClienteController();
        $clienteController->showClientes();
        break;   
        
    case 'add':
        $clienteController = new ClienteController();
        $clienteController->addCliente();
        break;

    case 'update':
        $clienteController = new ClienteController();
        $clienteController->editarCliente();
        break;

    case'editInfo':
        $clienteController = new ClienteController();
        $id = $params[1];
        $clienteController->editarInfoCliente($id);
        break;

    case 'delete':
        $clienteController = new ClienteController();
        $id = $params[1];
        $clienteController->deleteCliente($id);
        break;
    
    case 'listProductos':
        $productoController= new ProductoController();
        $productoController->showProductos();
        break;

    case 'showProductos':
        $productoController= new ProductoController();
        $id = $params[1];
        $productoController->showProductosById($id);
        break;

    case 'addProducto':
        $productoController= new ProductoController();
        $id = $params[1];
        $productoController->addProducto($id);
        break;  
    
    case 'deleteProducto':
        $productoController= new ProductoController();
        $id= $params[1];
        $idForanea= $params[2];
        $productoController->deleteProducto($id, $idForanea);
        break;

    case 'editInfoProducto';
        $productoController= new ProductoController();
        $id= $params[1];       
        $productoController->editarInfoProducto($id);
        break;

    case 'updateProducto':
        $productoController= new ProductoController();
        $productoController->editarProducto();
        break;

           
}


?>
