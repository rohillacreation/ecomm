<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute_value;

class Attribute extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function attribute_value()
    {
        return $this->hasMany(Attribute_value::class, 'attributes_id', 'id');
        // return $this->hasOne(Attribute_value::class, 'attribute_id');
    }
}
