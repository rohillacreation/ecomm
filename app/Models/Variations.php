<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Gallery::class, 'id', 'image_id');
    }
}
