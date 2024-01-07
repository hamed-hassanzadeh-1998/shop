<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMeta extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id'];
    protected $table='product_meta';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
