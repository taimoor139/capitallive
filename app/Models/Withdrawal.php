<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'status_id', 'status');
    }
}
