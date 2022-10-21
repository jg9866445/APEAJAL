<?php


function save($file,$funcion,$error){
    $text="Error en".$file."En la funcion".$funcion."Error es".var_dump($error)."\ln";
    error_log($text, 3, "log.log");
}