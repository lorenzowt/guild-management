<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\HeroStatus;
use Illuminate\Validation\Rule;

class StoreMissionRequest extends FormRequest
{
    protected $errorBag = 'createMission';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quest_id' => [
                'required',
                'integer',
                'exists:quests,id',
            ],

            'hero_ids' => [
                'required',
                'array',
                'min:1',
                'max:4',
            ],

            'hero_ids.*' => [
                'required',
                'integer',
                'distinct',
                Rule::exists('heroes', 'id')
                    ->where('status', HeroStatus::AVAILABLE->value),
            ],
        ];
    }
}