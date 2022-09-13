<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function paymentStatus(){
        return $this->hasOne(PaymentStatus::class, 'status_id', 'status');
    }

    public function returnOnInvestment(){
        return $this->hasOne(ReturnOnInvestment::class, 'id', 'accountType');
    }

    public function referral(){
        return $this->hasOne(Referral::class, 'user_id', 'userId');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'userId');
    }
}
