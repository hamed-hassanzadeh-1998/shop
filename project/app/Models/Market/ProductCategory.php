<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
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

    public function parent():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'parent_id')->with('parent');

    }

    public function children():HasMany
    {
        return $this->hasMany(ProductCategory::class,'parent_id')->with('children');
    }
    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function attributes():HasMany
    {
        return $this->hasMany(CategoryAttribute::class);
    }
}
