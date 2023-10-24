<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GamesStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:games|min:5|max:100',
            'description' => 'required',
            'game_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
