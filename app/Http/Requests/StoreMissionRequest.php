<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'exists:heroes,id',
            ],
        ];
    }
}