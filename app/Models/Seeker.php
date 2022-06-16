<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seeker extends Authenticatable
{
    use HasFactory;

    // Relationship to apply
    public function apply()
    {
        return $this->hasMany(Apply::class, 'seeker_id');
    }
}
