<?php
require_once 'model/producto.php';

class ProductoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new producto();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new producto();

        if(isset($_REQUEST['id_producto'])){
            $prod = $this->model->Obtener($_REQUEST['id_producto']);
        }

        require_once 'view/header.php';
        require_once 'view/producto/producto-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new producto();

        require_once 'view/header.php';
        require_once 'view/producto/producto-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $prod = new producto();

        $prod->id_producto = $_REQUEST['id_producto'];
        $prod->nombre = $_REQUEST['nombre'];
        $prod->descripcion = $_REQUEST['descripcion'];
        $prod->imagen = $_REQUEST['imagen'];
        $prod->id_categoria = $_REQUEST['id_categoria'];
        $prod->precio = $_REQUEST['precio'];
        $prod->existencias = $_REQUEST['existencias'];

        $this->model->Registrar($prod);

        header('Location: index.php?c=producto');
    }

    public function Editar(){
        $prod = new producto();

        $prod->id_producto = $_REQUEST['id_producto'];
        $prod->nombre = $_REQUEST['nombre'];
        $prod->descripcion = $_REQUEST['descripcion'];
        $prod->precio = $_REQUEST['precio'];
        $prod->existencias = $_REQUEST['existencias'];

        $this->model->Actualizar($prod);

        header('Location: index.php?c=producto');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_producto']);
        header('Location: index.php');
    }
}
