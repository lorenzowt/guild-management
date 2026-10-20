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

    public function levelUp()
    {
        if ($this->level >= self::MAX_LEVEL){
            return;
        }

        $this->increment('level');

    }

    public function levelDown()
    {
        if ($this->level === self::MIN_LEVEL){
            return;
        }

        $this->decrement('level');

    }

    public function injure()
    {
        $this->update([
            'status' => HeroStatus::INJURED,
        ]);
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

    public function deactivate()
    {
        $this->update([
            'status' => HeroStatus::DEACTIVATED,
        ]);
    }

}