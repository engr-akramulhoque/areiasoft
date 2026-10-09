<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $service = $this->route('service');
        
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('services', 'slug')->ignore($service?->id),
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'hero_description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:4096',
            ],

            'alt_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'overview' => [
                'nullable',
                'string',
            ],

            'metrics' => [
                'nullable',
                'array',
            ],

            'metrics.*.number' => [
                'nullable',
                'string',
                'max:100',
            ],

            'metrics.*.label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'technologies' => [
                'nullable',
                'array',
            ],

            'technologies.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'benefits' => [
                'nullable',
                'array',
            ],

            'benefits.*' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'cta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'cta_text' => [
                'nullable',
                'string',
            ],

            'cta_button' => [
                'nullable',
                'string',
                'max:255',
            ],

            'icon' => [
                'nullable',
                'string',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
                'max:4294967295',
            ],

            'active' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
