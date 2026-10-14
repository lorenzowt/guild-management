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

    public function markSucessful()
    {
        if ($this->status != MissionState::ASSIGNED) {
            return;
        } 

        $this->update([
            'status' => MissionState::SUCCESSFUL,
            'completed_at' => now()
        ]);
    }

    public function markFailed()
    {
        if ($this->status != MissionState::ASSIGNED) {
            return;
        } 

        $this->update([
            'status' => MissionState::FAILED,
            'completed_at' => now()
        ]);
    }


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

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }
}
