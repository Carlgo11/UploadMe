<?php

function lang($name){
    $jsonfile = file_get_contents(__DIR__."/../res/lang.json");
    $json = $jsonfile;
    $j = json_decode($json);
    if(isset($j->{$name})){
    $output = $j->{$name};
    return($output);
    }else{
        return null;
    }
}

function lang_html($name){
    $jsonfile = file_get_contents(__DIR__."/../res/lang.json");
    $json = $jsonfile;
    $j = json_decode($json);
    if(isset($j->{$name})){
    $output = $j->{$name};
    return(markdown($output));
    }else{
        return null;
    }
}