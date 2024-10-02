<?php

namespace app\models;

class PersonalRecord
{
    public function get_ranking()
    {
        $ranking = query("
                        WITH BestRecords AS (
                            SELECT 
                                m.id AS moviment_id,
                                pr.value AS pr_value,
                                m.name AS moviment_name,
                                u.name AS user_name,
                                pr.date AS date_reg,
                                ROW_NUMBER() OVER (PARTITION BY m.id, pr.user_id ORDER BY pr.value DESC) AS rn
                            FROM movement m
                            LEFT JOIN personal_record pr ON m.id = pr.movement_id 
                            LEFT JOIN user u ON pr.user_id = u.id
                        ),
                        RankedRecords AS (
                            SELECT 
                                moviment_id,
                                pr_value,
                                moviment_name,
                                user_name,
                                date_reg,
                                DENSE_RANK() OVER (PARTITION BY moviment_id ORDER BY pr_value DESC) AS position
                            FROM BestRecords
                            WHERE rn = 1  -- Apenas o melhor valor de cada usuário
                        )
                        SELECT 
                            m.id AS moviment_id,  
                            rr.pr_value,
                            m.name AS moviment_name, 
                            rr.user_name,
                            date_reg,
                            COALESCE(rr.position, 0) AS position  -- Define a posição como 0 se não houver registro
                        FROM movement m
                        LEFT JOIN RankedRecords rr ON m.id = rr.moviment_id
                        ORDER BY m.id, rr.position;
        ");

        $ranking_sort = [];
        // Percorre o array original e mapeia os objetos pelo moviment_id
        foreach ($ranking as $item) {
            $ranking_sort[$item->moviment_name][] = $item;
        }

        return $ranking_sort;
    }
}