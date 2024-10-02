<?php

require 'bootstrap.php';

try{
    $data = router();

    extract($data['data']);

    if(!isset($data['view'])){
        throw new Exception('O indice view está faltando!');
    }

    if(!file_exists(VIEWS.$data['view'].'.php')){
        throw new Exception("A view: {$data['view']} não existe!");
    }

    $view = $data['view'].'.php';

    require VIEWS.'master.php';
}catch(Exception $e){
    var_dump($e->getMessage());
}
