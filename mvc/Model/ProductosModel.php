<?php
require_once 'Model.php';
class ProductosModel extends Model{

    public function get($id=''){
        $query='';
        if($id==''){
            //retornar todos los productos
            $query="SELECT * FROM Producto P INNER JOIN Categoria C ON 
            P.id_categoria=C.id_categoria";
            return $this->get_query($query);
        }
        else{
            //retornar un producto por su llave primaria
            $query="SELECT * FROM Producto INNER JOIN Categoria C ON 
            P.id_categoria=C.id_categoria WHERE id_producto=:id_producto";
            return $this->get_query($query, [":id_producto"=>$id]);
        }
    }
    public function create($producto=array()){
        extract($producto);
        $query="INSERT INTO Producto(id_producto,nombre,descripcion,imagen,id_categoria,precio,existencias,estado) 
        VALUES (:id_producto, :nombre, :descripcion, :imagen, :id_categoria, :precio, :existencias, :estado)";
        return $this->set_query($query,$producto);
    }
    public function delete($id=''){
        $query="DELETE FROM Producto WHERE id_producto=:id_producto";
        return $this->set_query($query, [":id_producto"=>$id]);
    }
    public function update($producto=array()){
        extract($producto);
        $query="UPDATE Producto SET id_producto=:id_producto,nombre=:nombre,descripcion=:descripcion,imagen=:imagen,
        id_categoria=:id_categoria,precio=:precio,existencias=:existencias,estado=:estado WHERE id_producto=:id_producto";
        return $this->set_query($query, $producto);
    }
}
?>