<?php
abstract class Controller{
    public function render($view, $viewbag=array()){
        $file="views/". static::class . "/" .$view;
        $file=str_replace("Controller","",$file);
        if(is_file($file)){
            extract($viewbag);
            ob_start(); //Abriendo buffer
            require($file);
            $content=ob_get_contents(); //Leyendo contenido del buffer
            ob_end_clean(); //Cerrando el buffer
            echo $content;
        }
        else{
            echo "<h1>No existe este archivo</h1>";
        }
    }
}
?>