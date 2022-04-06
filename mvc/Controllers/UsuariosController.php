<?php
require_once 'Model/UsuariosModel.php';
require_once 'Controller.php';
//require_once 'core/validaciones.php';
class UsuariosController extends Controller{
    private $model;

    function __construct(){
        $this->model=new UsuariosModel();
    }

    public function login(){
        $this->render("Login.php");
    }

    public function logout(){
        //removiendo las variables de sesion
        session_unset();
        //destruendo la sesion
        session_destroy();
        $this->render("Login.php");
    }
    public function validate(){
        $errores=array();
        $viewBag=array();
        if(isset($_POST['enviar'])){
            extract($_POST);
            if(!isset($usuario)||estaVacio($usuario)){
                array_push($errores, "Debes ingresar el nombre de usuario");
            }
        
            if(!isset($clave)||estaVacio($clave)){
                array_push($errores, "Debes ingresar la contraseña");
            }
            if(count($errores)>0){
                
                $viewBag['errores']=$errores;
                $this->render("Login.php",$viewBag);
            }
            else{
                $login_data=$this->model->validateUser($usuario, $clave);
                if(count($login_data)>0){
                    $_SESSION['login_data']=$login_data[0];
                    header('location:'.PATH.'/Libros/index');
                }
                else{
                    array_push($errores, "Usuario y/o contraseña incorrecta");
                    $viewBag['errores']=$errores;
                    $this->render("Login.php",$viewBag);
                }
            }
        }
    }

    public function index(){
        
    }
    
    public function details(){
        var_dump($this->model->validateUser("guille", "1234567")[0]);
    }

    public function create(){
        
    }

    public function delete($id){
        
    }
}
?>