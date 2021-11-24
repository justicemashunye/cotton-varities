<?php

namespace App;
use App\Variety;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\AttributeValue;

class Attribute extends Model
{
    //protected $table = 'attributes';
    protected $fillable = [
        'name', 'slug','variety_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }
}
