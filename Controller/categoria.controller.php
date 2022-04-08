<?php
require_once 'model/categoria.php';

class CategoriaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new categoria();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/categoria/categoria.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new categoria();

        if(isset($_REQUEST['id_categoria'])){
            $prod = $this->model->Obtener($_REQUEST['id_categoria']);
        }

        require_once 'view/header.php';
        require_once 'view/categoria/categoria-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new categoria();

        require_once 'view/header.php';
        require_once 'view/categoria/categoria-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $categoria = new categoria();

        $categoria->id_categoria = $_REQUEST['id_categoria'];
        $categoria->nombre = $_REQUEST['nombre'];

        $this->model->Registrar($categoria);

        header('Location: index.php?c=categoria');
    }

    public function Editar(){
        $categoria = new categoria();

        
        $categoria->id_categoria = $_REQUEST['id_categoria'];
        $categoria->nombre = $_REQUEST['nombre'];

        $this->model->Actualizar($categoria);

        header('Location: index.php?c=categoria');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_categoria']);
        header('Location: index.php');
    }
}
