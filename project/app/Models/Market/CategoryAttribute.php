<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=['id'];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function values():HasMany
    {
        return $this->hasMany(CategoryValue::class);
    }
}
