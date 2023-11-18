<?php

namespace App\Models\Content;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded=['id'];


    /***************Relations*************/


    public function commentable()
    {
        return $this->morphTo();

    }

    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
}
