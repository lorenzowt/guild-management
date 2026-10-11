<?php

namespace App\Models;

use App\Enums\HeroClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\HeroStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mission;

class Hero extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'hero_class',
        'level',
        'status',
    ];
    
    protected function casts(): array
    { 
        return [
        'hero_class' => HeroClass::class,
        'status' => HeroStatus::class,
        ];
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class);
    }

}