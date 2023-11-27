<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailFile extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='public_mail_files';
    protected $guarded=['id'];

    public function email()
    {
        return $this->belongsTo(Email::class,'public_mail_id');
    }
}
