<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CashPayment extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function payments():MorphMany
    {
        return $this->morphMany('App\Models\Market\Payment','paymetable');
    }
}
