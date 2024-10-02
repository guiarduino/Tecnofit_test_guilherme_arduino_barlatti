<?php

    function query($sql){
        try{
            $connect = connect();

            $query = $connect->query($sql);
            return $query->fetchAll();
        }catch (Exception $e) {
            return false;
        }
    }