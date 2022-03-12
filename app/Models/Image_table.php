<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_table extends Model
{
    use HasFactory;
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'id', 'image_id');
    }
}
