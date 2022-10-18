<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ClienteView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

   public function showClientes($clientes) {
        // asigno variables al tpl smarty 
        $this->smarty->assign('clientes', $clientes);

        // mostrar el tpl
        $this->smarty->display('listaCliente.tpl');
    }

    public function editarCliente($cliente){
        $this->smarty->assign ('cliente', $cliente);
        $this->smarty->assign ('titulo' , "Editar cliente");
        $this->smarty->display('edit_cliente.tpl');
    }   

    public function deleteCliente($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('errorDelete.tpl');
    }

}
?>