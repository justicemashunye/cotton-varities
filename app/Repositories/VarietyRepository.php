<?php
namespace App\Repositories;

use App\Variety;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\VarietyContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class VarietyRepository extends BaseRepository implements VarietyContract
{
    use UploadAble;

    
    public function __construct(Variety $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

   
    public function listVarieties(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    
    public function findVarietyById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    
    public function createVariety(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'varieties');
            }

            $merge = $collection->merge(compact('image'));

            $variety = new Variety($merge->all());

            $variety->save();

            return $variety;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

 
    public function updateVariety(array $params)
    {
        $variety = $this->findVarietyById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($variety->image != null) {
                $this->deleteOne($variety->image);
            }

            $image = $this->uploadOne($params['image'], 'varieties');
        }

        $merge = $collection->merge(compact('image'));

        $variety->update($merge->all());

        return $variety;
    }

   
    public function deleteVariety($id)
    {
        $variety = $this->findVarietyById($id);

        if ($variety->image != null) {
            $this->deleteOne($variety->image);
        }

        $variety->delete();

        return $variety;
    }

    public function findBySlug($slug)
    {
        return Variety::with('attributes')
            ->where('slug', $slug)
            ->first();
    }


}