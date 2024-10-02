<?php

    function query($sql){
        try{
            $connect = connect();

            $query = $connect->query($sql);
            return $query->fetchAll();
        }catch (PDOExcepition $e) {
            var_dump($e->getMessage());
        }
    }