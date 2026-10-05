<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateHeroRequest extends FormRequest
{
    protected $errorBag = 'editHero';

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

    protected function failedValidation(Validator $validator): void
    {
        session()->flash('edit_hero_id', $this->route('hero')->id);
        
        parent::failedValidation($validator);
    }
}