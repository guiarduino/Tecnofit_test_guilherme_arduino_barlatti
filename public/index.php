<?php

require 'bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

try{
    $data = router();

    if ($data instanceof Response) {
        header('Content-Type: application/json');
        http_response_code($data->getStatusCode());
        print_r($data->getContent());
        die();
    }

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
