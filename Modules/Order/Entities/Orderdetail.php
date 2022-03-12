<?php

namespace Modules\Order\Entities;


use App\Models\product;
use App\Models\Variations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orderdetail extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
    public function variant()
    {
        return $this->hasOne(Variations::class, 'id', 'variant_id');
    }
}
