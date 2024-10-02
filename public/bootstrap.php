<?php

    require '../vendor/autoload.php';
    session_start();

    use Dotenv\Dotenv;

    // Carregando o arquivo .env da raiz do projeto
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../'); // Um nível acima da pasta public
    $dotenv->load();