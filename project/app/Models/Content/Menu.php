<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{

    use HasFactory , SoftDeletes;
    protected $guarded=['id'];


    public function parent()
    {
        return $this->belongsTo($this,'parent_id');
    }

    public function answers()
    {
        return $this->hasMany($this,'parent_id');
    }

}
