<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAdmin extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
