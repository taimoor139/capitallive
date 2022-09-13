<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'transaction_id',
        'amount',
        'status',
        'user_id'
    ];

    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'status_id', 'status');
    }
}
