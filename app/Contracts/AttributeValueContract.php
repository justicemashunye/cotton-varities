<?php

namespace App\Contracts;

interface AttributeValueContract
{
    public function listAttributeValues(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    
    public function findAttributeValueById(int $id);

    
    public function createAttributeValue(array $params);

   
    public function updateAttributeValue(array $params);

    
    public function deleteAttributeValue($id);
}