<?php

namespace app\controllers;
use app\models\PersonalRecord;

class Home
{

    public function index($params)
    {
        $personalRecord = new PersonalRecord();
        $ranking_sort = $personalRecord->get_ranking();

        return [
            'view' => 'home',
            'data' => [
                'ranking' => $ranking_sort
            ]
        ];
    }

}