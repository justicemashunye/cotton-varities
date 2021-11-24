<?php

namespace App\Contracts;


interface VarietyContract
{
    
    public function listVarieties(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

   
    public function findVarietyById(int $id);

   
    public function createVariety(array $params);

  
    public function updateVariety(array $params);

    
    public function deleteVariety($id);

    public function findBySlug($slug);
}