<?php
require_once 'Model/ProductosModel.php';
require_once 'Model/CategoriasModel.php';
require_once 'Controller.php';
//require_once 'core/validaciones.php';

class ProductosController extends Controller{
    private $model;

    function __construct(){
        $this->model= new ProductosModel();
        /*if(isset($_SESSION['login_data'])){
            header('location' . PATH . '/Usuarios/login');
        }
        if($_SESSION['login_data']['id_tipo_usuario']!=1){
            header('location' .PATH.'/Productos/index');
        }
        $this->model=new ProductosModel();*/
    }

    public function index(){
        $viewbag=array();
        $viewbag['productos']=$this->model->get();
        $this->render("index.php",$viewbag);
    }
    
    public function details($id){
       //echo json_encode($this->model->get($id)[0]);
       var_dump($this->model->get($id));
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
    }
}
?>