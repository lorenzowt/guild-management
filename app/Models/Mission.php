<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\MissionState;
use App\Models\Hero;

class Mission extends Model
{
    protected $fillable = [
      'quest_id',
      'status',
      'completed_at',  
    ];

    protected function casts(): array
    {
        return [
            'status' => MissionState::class,
            'completed_at' => 'datetime',
        ];
    }

    public function heroes()
    {
        return $this->belongsToMany(Hero::class);
    }
}
