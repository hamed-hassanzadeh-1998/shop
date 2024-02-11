<?php

namespace App\Models\Market;


use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function payment():BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
    public function delivery():BelongsTo
    {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address():BelongsTo
    {
        return $this->belongsTo(Address::class,'address_id');
  }
    public function coupon():BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
    public function commonDiscount():BelongsTo
    {
        return $this->belongsTo(CommonDiscount::class);
    }
}
