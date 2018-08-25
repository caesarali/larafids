<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirlineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $picture = 'required';
        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $picture = 'nullable';
        }
        return [
            'name' => 'required|string|max:50',
            'corporate' => 'required|string|max:100',
            'picture' => $picture.'|file|mimes:jpg,png|max:2048'
        ];
    }
}
