<?php
require_once 'model/cliente.php';

class AdminController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new admin();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new cliente();

        if(isset($_REQUEST['correo'])){
            $prod = $this->model->Obtener($_REQUEST['correo']);
        }

        require_once 'view/header.php';
        require_once 'view/cliente/cliente-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new cliente();

        require_once 'view/header.php';
        require_once 'view/cliente/cliente-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $client = new cliente();

        $client->correo = $_REQUEST['correo'];
        $client->nombres = $_REQUEST['nombres'];
        $client->apellidos = $_REQUEST['apellidos'];
        $client->telefono = $_REQUEST['telefono'];
        $client->direccion = $_REQUEST['direccion'];
        $client->tarjeta = $_REQUEST['tarjeta'];
        $client->contraseña = $_REQUEST['contraseña'];

        $this->model->Registrar($client);

        header('Location: index.php?c=cliente');
    }

    public function Editar(){
        $client = new cliente();

        
        $client->correo = $_REQUEST['correo'];
        $client->nombres = $_REQUEST['nombres'];
        $client->apellidos = $_REQUEST['apellidos'];
        $client->telefono = $_REQUEST['telefono'];
        $client->direccion = $_REQUEST['direccion'];
        $client->tarjeta = $_REQUEST['tarjeta'];
        $client->contraseña = $_REQUEST['contraseña'];

        $this->model->Actualizar($client);

        header('Location: index.php?c=cliente');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['correo']);
        header('Location: index.php');
    }
}
