<?php
require_once 'Model/CategoriasModel.php';
require_once 'Controller.php';
require_once 'core/validaciones.php';

class ProductosController extends Controller{
    private $model;

    function __construct(){
        if(isset($_SESSION['login_data'])){
            header('location' . PATH . '/Usuarios/login');
        }
        if($_SESSION['login_data']['id_tipo_usuario']!=1){
            header('location' .PATH.'/Productos/index');
        }
        $this->model=new ProductosModel();
    }

    public function index(){
        $viewbag=array();
        $viewbag['productos']=$this->model->get();
        $this->render("index.php",$viewbag);
    }
    
    public function details($id){
       echo json_encode($this->model->get($id)[0]);
    }

    public function create(){
        $categoriasModel=new CategoriasModel();
        $viewbag=array();
        $viewbag['categorias']=$categoriasModel->get();
        $this->render("new.php", $viewbag);
    }

    public function delete($id){
        echo $this->model->delete($id);
        header('location:'.PATH.'/Productos/index');
    }

    public function update($id){
        //echo $this->model->update($id);
        //header('location:'.PATH.'/productos/index');
    }

    public function add(){
        $errores=array();
        if(isset($_POST['Guardar'])){
            extract($_POST);
            if(!isset($id_producto)||estaVacio($id_producto)){
                array_push($errores, "Debes ingresar el codigo del producto");
            }
            else if (!esCodigoProducto($id_producto)){
                array_push($errores, "El codigo de la producto no cumple el formato PRODXXX");
            }
        
            if(!isset($nombre)||estaVacio($nombre)){
                array_push($errores, "Debes ingresar el nombre del producto");
            }

            if(!isset($descripcion)||estaVacio($descripcion)){
                array_push($errores, "Debes ingresar la descripcion del producto");
            }

            if(!isset($imagen)||estaVacio($imagen)){
                array_push($errores, "Debes ingresar una imagen del producto");
            }
            else if (!ComprobarImagen($id_producto)){
                array_push($errores, "La extensión de la imagen no es la correcta");
            }
        
            if(!isset($precio)||estaVacio($precio)){
                array_push($errores, "Debes ingresar el precio");
            }

            if(!isset($existencias)||estaVacio($existencias)){
                array_push($errores, "Debes ingresar las existencias del producto");
            }
            else if (!esNumero($existencias)){
                array_push($errores, "Las existencias no pueden incluir letras");
            }
            
            if(!isset($estado)||estaVacio($estado)){
                array_push($errores, "Debes ingresar el estado del producto del producto");
            }

            $producto['id_producto']=$id_producto;
            $producto['nombre']=$nombre;
            $producto['descripcion']=$descripcion;
            $producto['imagen']=$imagen;
            $producto['id_categoria']=$id_categoria;
            $producto['precio']=$precio;
            $producto['existencias']=$existencias;
            $producto['estado']=$estado;
            
           
            if(count($errores)>0){
                $viewBag=array();
                $viewBag['errores']=$errores;
                $viewBag['producto']=$producto;
                $categoriasModel=new CategoriasModel();
                $viewbag['categorias']=$categoriasModel->get();
                var_dump($viewbag);
                $this->render("new.php",$viewBag);

            }
            else{
                if($this->model->create($producto)>0){
                header('location:'.PATH.'/Productos/index');
                }
                else{
                    array_push($errores, "YA existe un producto con este codigo");
                    $viewBag['errores']=$errores;
                    $viewBag['producto']=$producto;
                    $this->render("new.php",$viewBag);
                }
            }
        }
    }
}
?>