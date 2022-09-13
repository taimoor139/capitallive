<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'category',
        'subject',
        'message',
        'status',
        'file',
        'user_id'
    ];

    public function messages(){
        return $this->hasMany(Message::class, 'ticket_id', 'ticket_id');
    }

    public function users(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}

