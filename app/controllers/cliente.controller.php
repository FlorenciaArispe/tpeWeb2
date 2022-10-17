<?php
require_once './app/models/cliente.model.php';
require_once './app/views/cliente.view.php';
require_once './app/helpers/auth.Helper.php';

class ClienteController {

    private $model;
    private $view;
    private $authHelper;
    
    public function __construct () {
        $this->model = new ClienteModel();
        $this->view = new ClienteView();

         // barrera de seguridad
         $this->authHelper = new AuthHelper();
         //$authHelper->checkLoggedIn();    
    }
   
    public function showClientes(){
        session_start();
        $clientes= $this->model->getClientes();
        $this->view->showClientes($clientes);       
    }


    public function addCliente(){
        if(isset($_POST['nombre'])&& isset($_POST['apellido'])&& isset($_POST['dni'])&& isset($_POST['email'])){
            $this->authHelper->checkLoggedIn();
            $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $id = $this->model->insertCliente($nombre, $apellido, $dni, $email);
        header("Location: " . BASE_URL  .'list');
        }
        else{
            var_dump("Complete todos los datos");
            die();
        }
        
    }
    
    
    public function editarInfoCliente($id){ 
        $cliente= $this->model->getCliente($id);
        $this->view->editarCliente($cliente);        
    }

    public function editarCliente(){
        if(isset($_POST['nombre'])&& isset($_POST['apellido'])&& isset($_POST['dni'])&& isset($_POST['email'])){
            $this->authHelper->checkLoggedIn();
            $cliente= new stdClass();
            $cliente->id= $_POST['id'];
            $cliente->nombre= $_POST['nombre'];
            $cliente->apellido= $_POST['apellido'];
            $cliente->dni= $_POST['dni'];
            $cliente->email= $_POST['email'];
            $this->model->editCliente($cliente);
            header("Location: " . BASE_URL . 'list');
           
        }
        else{
            var_dump("Complete todos los datos");
            die();
        }

    }

    public function deleteCliente($id) {
        $this->model->deleteClienteById($id);
        header("Location: " . BASE_URL . 'list');
    }

}