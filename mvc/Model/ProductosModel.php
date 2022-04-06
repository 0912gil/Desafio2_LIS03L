<?php
require_once 'Model.php';
class ProductosModel extends Model{

    public function get($id=''){
        $query='';
        if($id==''){
            //retornar todos los productos
            $query="SELECT * FROM producto P INNER JOIN categoria C ON 
            P.id_categoria=C.id_categoria";
            return $this->get_query($query);
        }
        else{
            //retornar un producto por su llave primaria
            $query="SELECT * FROM producto WHERE id_producto=:id_producto";
            return $this->get_query($query, [":id_producto"=>$id]);
        }
    }
    public function create($productos=array()){
        $query="INSERT INTO producto(id_producto,nombre,descripcion,imagen,id_categoria,precio,existencias,estado) 
        VALUES (:id_producto, :nombre, :descripcion, :imagen, :id_categoria, :precio, :existencias, :estado)";
        return $this->set_query($query,$productos);
    }
    public function delete($id=''){
        $query="DELETE FROM producto WHERE id_producto=:id_producto";
        return $this->set_query($query, [":id_producto"=>$id]);
    }
    public function update($productos=array()){
        extract($productos);
        $query="UPDATE producto SET id_producto=:id_producto,nombre=:nombre,descripcion=:descripcion,imagen=:imagen,
        id_categoria=:id_categoria,precio=:precio,existencias=:existencias,estado=:estado WHERE id_producto=:id_producto";
        return $this->set_query($query, $productos);
    }
}
?>