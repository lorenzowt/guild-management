<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'boss_name',
        'description',
        'difficulty',
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
