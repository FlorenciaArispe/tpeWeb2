<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProductoView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

   public function showProductosById($productos,$cliente,$id){
        $this->smarty->assign('count', count($productos)); 
        $this->smarty->assign('productos', $productos);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('cliente', $cliente);


        // mostrar el tpl
        $this->smarty->display('listaProductosById.tpl');

    }

    public function showProductosVendidos($productosVendidos){
        $this->smarty->assign('count', count($productosVendidos));
        $this->smarty->assign('productosVendidos', $productosVendidos); 

        $this->smarty->display('listaProductos.tpl');
    }

    public function editarProducto($producto){
        $this->smarty->assign ('producto', $producto);
       
        $this->smarty->display('edit_product.tpl');
    }
}