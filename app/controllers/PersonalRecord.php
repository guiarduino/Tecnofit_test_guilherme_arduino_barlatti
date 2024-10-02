<?php

namespace app\Controllers;
use app\models\PersonalRecord AS ModelPersonalRecord;
use Illuminate\Http\JsonResponse;
use Http\Message\MessageFactory;

use Symfony\Component\HttpFoundation\Response;

class PersonalRecord
{
    public function getRanking()
    {
        $personalRecord = new ModelPersonalRecord();
        $ranking_sort = $personalRecord->get_ranking();
        
        if(!$ranking_sort){
            return new Response(
                json_encode(['message' => "Falha na aplicação"]),
                400,
                ['Content-Type' => 'application/json']
            );
        }

        if(empty($ranking_sort)){
            return new Response(
                json_encode(['data' => ['ranking' => $ranking_sort]]),
                404,
                ['Content-Type' => 'application/json']
            );
        }

        return new Response(
            json_encode(['data' => ['ranking' => $ranking_sort]]),
            200,
            ['Content-Type' => 'application/json']
        );

    }
}