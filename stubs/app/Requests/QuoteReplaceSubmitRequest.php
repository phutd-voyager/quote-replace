<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteReplaceSubmitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quote-replace-text' => ['required', 'string', 'min:10', 'max:1000']
        ];
    }
}