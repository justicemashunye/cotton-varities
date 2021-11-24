<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;
use App\Variety;

class AttributeValue extends Model
{
    //
    protected $table = 'attribute_values';

   
    protected $fillable = [
        'attribute_id', 'value', 'image','variety_id'
    ];

   
    protected $casts = [
        'attribute_id'  =>  'integer',
        'variety_id'  =>  'integer',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
