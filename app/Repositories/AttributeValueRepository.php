<?php
namespace App\Repositories;

use App\AttributeValue;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AttributeValueContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class AttributeValueRepository extends BaseRepository implements AttributeValueContract
{
    use UploadAble;

    
    public function __construct(AttributeValue $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

   
    public function listAttributeValues(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    
    public function findAttributeValueById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    
    public function createAttributeValue(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'attributevalues');
            }

            $merge = $collection->merge(compact('image'));

            $attributevalue = new AttributeValue($merge->all());

            $attributevalue->save();

            return $attributevalue;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

 
    public function updateAttributeValue(array $params)
    {
        $attributevalue = $this->findAttributeValueById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($attributevalue->image != null) {
                $this->deleteOne($attributevalue->image);
            }

            $image = $this->uploadOne($params['image'], 'attributevalues');
        }

        $merge = $collection->merge(compact('image'));

        $attributevalue->update($merge->all());

        return $attributevalue;
    }

   
    public function deleteAttributeValue($id)
    {
        $attributevalue = $this->findAttributeValueById($id);

        if ($attributevalue->image != null) {
            $this->deleteOne($attributevalue->image);
        }

        $attributevalue->delete();

        return $attributevalue;
    }
}