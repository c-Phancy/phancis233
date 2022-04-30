<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'social.*' => 'sometimes|required',
            'handle.*' => 'sometimes|required'
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */

    // FIX ME: Return a message for a missing social-name with the handle-name and vice versa
        // instead of social.1 etc.
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    } 
}
