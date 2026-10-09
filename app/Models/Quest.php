<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Quest;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'boss_name',
        'description',
        'difficulty',
    ];
}
