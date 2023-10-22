<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory , SoftDeletes,Sluggable;
    protected $guarded=['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $casts=['image'=>'array'];

    //************************Relation***********************//
    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class,'category_id');
    }
}
