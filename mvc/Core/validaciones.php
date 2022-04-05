<?php
function estaVacio($var){
 return empty(trim($var));//si hay espacio en blanco
}

function esTexto($var){
    return preg_match('/[a-zA-Z ]+$/',$var);
}

function esCodigoProducto($var){
    return preg_match('/^PROD[0]un{3}[0-9]$/',$var);
}

function ComprobarImagen($archivo){
    //La expresión regular analiza si el archivo es de
    //una extensión válida para una imagen gif|jpeg|jpg|png
    //utilizando la función preg_match()
        $patron = "/\.(jpe?g|png)$/i";
        $verificado = preg_match($patron, $archivo);
        $esimagen = $verificado == true ? " (es imagen)" : " (no es imagen)";
        return $esimagen;
}

function esNumero($var){
    return preg_match('/^[0-9]$/', $var);
}

function esTelefono($var){
    return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$var);
}
 ?>