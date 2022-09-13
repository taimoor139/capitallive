<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referrer_name',
        'pairStatus',
        'position'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function deposit(){
        return $this->hasOne(Deposit::class, 'userId', 'user_id');
    }
}
