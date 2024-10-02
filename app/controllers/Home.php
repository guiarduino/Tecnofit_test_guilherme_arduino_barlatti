<?php

namespace app\Controllers;
use app\models\PersonalRecord AS ModelPersonalRecord;

class Home
{

    public function index($params)
    {
        $personalRecord = new ModelPersonalRecord();
        $ranking_sort = $personalRecord->get_ranking();

        return [
            'view' => 'home',
            'data' => [
                'ranking' => $ranking_sort
            ]
        ];
    }

}