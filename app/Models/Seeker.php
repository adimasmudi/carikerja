<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    use HasFactory;

    // Relationship to apply
    public function apply()
    {
        return $this->hasMany(Apply::class, 'seeker_id');
    }
}
