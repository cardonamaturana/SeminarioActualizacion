<?php

Class Redireccion{
    public static function redirigir($url){
        //unique resource location
        header('Location: ' .$url,true,301);
        exit();
    }
}