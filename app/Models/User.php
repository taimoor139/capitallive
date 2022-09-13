<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN_USER = 1;
    const NORMAL_USER = 2;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'username',
        'sponsor',
        'terms',
        'rank',
        'trade_activation'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function loginSecurity(){
        return $this->hasOne(LoginSecurity::class, 'user_id', 'id');
    }

    public function deposits(){
        return $this->hasMany(Deposit::class, 'UserId', 'id');
    }

    public function awards(){
        return $this->hasMany(EarnAward::class, 'user_id', 'id');
    }

    public function rankAward(){
        return $this->hasOne(RankAward::class, 'id','rank');
    }

    public function withdraws(){
        return $this->hasMany(Withdrawal::class, 'UserId', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function balance(){
        return $this->hasOne(Balance::class, 'user_id', 'id');
    }

    public function assignRoles(){
        return $this->hasMany(AssignRole::class, 'user_id', 'id');
    }

    public function referral(){
        return $this->hasOne(Referral::class, 'user_id', 'id');
    }

    public function points(){
        return $this->hasOne(Point::class, 'user_id', 'id');
    }

    public function childs(){
        return $this->hasMany(Referral::class, 'referrer_name', 'username');
    }
}
