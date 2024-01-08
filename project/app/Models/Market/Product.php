<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $guarded=['id'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $casts=['image'=>'array'];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);

    }
    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class);

    }

    public function metas():HasMany
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function colors():HasMany
    {
        return $this->hasMany(ProductColor::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}
