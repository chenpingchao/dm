<?php

function dd($var){
    echo "<pre>";
    if(is_numeric($var) || is_string($var)){
        echo $var;
    }elseif(is_array($var)){
        print_r($var);
    }else{
        var_dump($var);
    }
    echo "</pre>";
};