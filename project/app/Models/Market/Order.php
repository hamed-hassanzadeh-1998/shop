<?php

namespace App\Models\Market;


use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function orderItems():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }


    public function getPaymentStatusValueAttribute():string
    {
        return match ($this->payment_status) {
            0 => 'پرداخت نشده',
            1 => 'پرداخت شده',
            2 => 'باطل شده',
            default => 'برگشت داده شده',
        };
    }

    public function getPaymentTypeValueAttribute():string
    {
        return match ($this->payment_type) {
            0 => 'آنلاین',
            1 => 'آفلاین',
            default => 'در محل',
        };
    }

    public function getDeliveryStatusValueAttribute():string
    {
        return match ($this->delivery_status) {
            0 => 'ارسال نشده',
            1 => 'در حال ارسال',
            2 => 'ارسال شده',
            default => 'تحویل شده',
        };
    }
    public function getOrderStatusValueAttribute()
    {
        return match ($this->order_status) {
            1 => 'در انتظار تایید',
            2 => 'تاییده نشده',
            3 => 'تایید شده',
            4 => 'باطل شده',
            5 => 'مرجوع شده',
            default => 'بررسی نشده',
        };
    }

}
