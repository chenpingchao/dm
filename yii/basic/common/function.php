<?php

function dd($var){
    echo "<pre>";
    if(is_array($var)){
        print_r($var);
    }elseif(is_string($var)){
        echo $var;
    }else{
        var_dump($var);
    }
    echo '</pre>';

}