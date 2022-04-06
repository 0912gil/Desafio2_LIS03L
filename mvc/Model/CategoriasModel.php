<?php
require_once 'ModelPDO.php';
class CategoriasModel extends ModelPDO{

    public function get($id=''){
        $query='';
        if($id==''){
            //retornar todos los productos
            $query="SELECT * FROM Categoria ";
            return $this->get_query($query);
        }
        else{
            //retornar un producto por su llave primaria
            $query="SELECT * FROM Categoria WHERE id_categoria=:id_categoria";
            return $this->get_query($query, [":id_categoria"=>$id]);
        }
    }
    public function create($categoria=array()){
        $query="INSERT INTO categoria(id_categoria,nombre) 
        VALUES (:id_categoria, :nombre)";
        return $this->set_query($query,$categoria);
    }
    public function delete($id=''){
        $query="DELETE FROM categoria WHERE id_categoria=:id_categoria";
        return $this->set_query($query, [":id_categoria"=>$id]);
    }
    public function update($categoria=array()){
        extract($producto);
        $query="UPDATE categoria SET id_categoria=:id_categoria,nombre=:nombre, WHERE id_categoria=:id_categoria";
        return $this->set_query($query, $categoria);
    }
}
?>