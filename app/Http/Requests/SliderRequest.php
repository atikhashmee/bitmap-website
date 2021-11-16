<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

    public function rules()
    {
        return [
            "headertitle" => "required",
            "url"         => "url",
            "date"        => "date"
        ];
    }

    public function messages()
    {
        return [
            "headertitle.required" => "You have to put at least something for the title",
            "url.url" => "Your Given URL does not seem to be valid URL",
            "date" => "You have given wrong date format"
        ];
        
    }
}