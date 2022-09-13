<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignRole extends Model
{
    use HasFactory;

    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
