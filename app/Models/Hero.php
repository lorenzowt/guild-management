<?php

namespace App\Models;

use App\Enums\HeroClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\HeroStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mission;

class Hero extends Model
{
    private const MAX_LEVEL = 10;
    private const MIN_LEVEL = 1;

    use HasFactory;
    
    protected $fillable = [
        'name',
        'hero_class',
        'level',
        'status',
    ];

    public function levelUp():bool
    {
        if ($this->level >= self::MAX_LEVEL){
            return false;
        }

        $this->increment('level');

        return true;
    }

    public function levelDown():bool
    {
        if ($this->level === self::MIN_LEVEL){
            return false;
        }

        $this->decrement('level');

        return true;
    }
    
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