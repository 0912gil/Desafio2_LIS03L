<?php
function estaVacio($var){
 return empty(trim($var));//si hay espacio en blanco
}

function esTexto($var){
    return preg_match('/[a-zA-Z ]+$/',$var);
}

function esCodigo($var){
    return preg_match('/^PROD[0]un{3}[0-9]$/',$var);
}

function esTelefono($var){
    return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$var);
}
 ?>