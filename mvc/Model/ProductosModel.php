<?php
require_once 'ModelPDO.php';
class ProductosModel extends ModelPDO{

    public function get($id=''){
        $query='';
        if($id==''){
            //retornar todos los Libros
            $query="SELECT * FROM Libros L INNER JOIN Autores A ON L.codigo_autor=A.codigo_autor
                    INNER JOIN Editoriales E ON L.codigo_editorial=E.codigo_editorial
                    INNER JOIN Generos G ON L.id_genero=G.id_genero";
            return $this->get_query($query);
        }
        else{
            //retornar un libro por su llave primaria
            $query="SELECT * FROM Libros L INNER JOIN Autores A ON L.codigo_autor=A.codigo_autor
                    INNER JOIN Editoriales E ON L.codigo_editorial=E.codigo_editorial
                    INNER JOIN Generos G ON L.id_genero=G.id_genero WHERE codigo_Libro=:codigo_libro";
            return $this->get_query($query, [":codigo"=>$id]);
        }
        
    }
    public function create($libro=array()){
        $query="INSERT INTO ****";
        return $this->set_query($query,$libro);
    }
    public function delete($id=''){
        $query="DELETE FROM **** WHERE codigo=:codigo";
        return $this->set_query($query, [":codigo"=>$id]);
    }
    public function update($libro=array()){
        extract($libro);
        $query="UPDATE **** SET nombre=:nombre,descripcion=:descripcion,imagen=:imagen,categoria=:categoria,precio=:precio,
        existencias=:existencias, WHERE codigo=:codigo";
        return $this->set_query($query, $libro);
    }
}
?>