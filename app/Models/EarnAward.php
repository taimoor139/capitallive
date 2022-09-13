<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarnAward extends Model
{
    use HasFactory;
    protected $fillable = [
        'award_id',
        'user_id'
    ];

    public function rank(){
        return $this->hasOne(RankAward::class, 'id', 'award_id');
    }
}
