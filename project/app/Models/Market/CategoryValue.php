<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryValue extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function attribute():BelongsTo
    {
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
