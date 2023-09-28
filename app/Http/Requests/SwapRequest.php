<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwapRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required',
            'id' => 'required',
            'swap_id' => 'required',
        ];
    }
}
