<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAnimalRequest extends Request
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
        return [
        'name' => 'required',
        'image' => 'required|image',
        'type' => 'required',
        'vet_station' => 'required',
        'address' => 'required',
        'city' => 'required',
        'region' => 'required',
        'sex' => 'required',
        'age' => 'required|numeric',
        'description' => 'required',
        ];
    }
    
}
