<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHeroRequest extends FormRequest
{
    protected $errorBag = 'createHero';

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => preg_replace('/\s+/', ' ', trim($this->name)),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:20',
            'hero_class' => 'required|in:warrior,cleric,mage,rogue',
            'level' => 'required|integer|min:1|max:10'
        ];
    }
}
