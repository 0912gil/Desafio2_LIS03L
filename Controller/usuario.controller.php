<?php
require_once 'model/cliente.php';

class UsuarioController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new cliente();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-login.php';
        require_once 'view/footer.php';
    }

    public function Loged(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new cliente();

        require_once 'view/header.php';
        require_once 'view/usuario/usuario-nuevo.php';
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

        header('Location: index.php?c=usuario');
    }
}
