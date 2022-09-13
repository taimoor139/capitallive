<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
        'body',
        'user_id'
    ];

    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
