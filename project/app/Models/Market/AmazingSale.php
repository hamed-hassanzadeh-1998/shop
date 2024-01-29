<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmazingSale extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
