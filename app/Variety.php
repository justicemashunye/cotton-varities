<?php

namespace App;
use App\Attribute;
use App\AttributeValue;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    //
    protected $table = 'varieties';

    protected $fillable = [
        'name', 'slug','image'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function attributevalues()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
