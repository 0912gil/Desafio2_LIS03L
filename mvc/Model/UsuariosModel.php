<?php
require_once 'ModelPDO.php';
class UsuariosModel extends ModelPDO{

    public function validateUser($username,$pass){
        $query="SELECT usuario, id_tipo_usuario, activo FROM usuarios WHERE usuario=:usuario AND password=SHA2(:clave, 256)";
        return $this->get_query($query, [":usuario"=>$username, ":clave"=>$pass]);
    }
    public function get($id=''){
       
    }
    public function create(){
        
    }
    public function delete($id=''){
        
    }
    public function update(){
        
    }
}
?>