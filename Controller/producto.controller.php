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

    public function Usuario(){
        require_once 'view/header.php';
        require_once 'view/producto/producto-usuario.php';
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
        if(!isset($_REQUEST['id_producto'])||estaVacio($_REQUEST['id_producto'])){
            array_push($errores, "Debes ingresar el codigo del editorial");
            $prod->id_prooducto = $_REQUEST['id_producto'];
        }
        else if (!esCodigo($_REQUEST['id_producto'])){
            array_push($errores, "El codigo del producto no cumple el formato PRODXXXXX");
            $prod->id_producto = $_REQUEST['id_producto'];
        }

        if(!isset($_REQUEST['nombre'])||estaVacio($_REQUEST['nombre'])){
            array_push($errores, "Debes ingresar el nombre del producto");
            $prod->nombre = $_REQUEST['nombre'];
        }
        
        if(!isset($_REQUEST['descripcion'])||estaVacio($_REQUEST['descripcion'])){
            array_push($errores, "Debes ingresar la descripcion del producto");
            $prod->descripcion = $_REQUEST['descripcion'];
        }
        
        if (!ComprobarImagen(addslashes(file_get_contents($_FILES['imagen']['tmp_name'])))){
            array_push($errores, "El codigo de la editorial no cumple el formato EDIXXX");
            $prod->imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        }

        $prod->imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $prod->id_categoria = $_REQUEST['id_categoria'];

        if(!isset($_REQUEST['precio'])||estaVacio($_REQUEST['precio'])){
            array_push($errores, "Debes ingresar el precio del producto");
            $prod->precio = $_REQUEST['precio'];
        }

        if(!isset($_REQUEST['existencias'])||estaVacio($_REQUEST['existencias'])){
            array_push($errores, "Debes ingresar las existencias del producto");
            $prod->existencias = $_REQUEST['existencias'];
        }

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
