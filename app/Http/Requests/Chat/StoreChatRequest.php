<?php

namespace App\Http\Requests\Chat;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreChatRequest extends FormRequest
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
            //
            'user_id'=>'required',
            'doctor_id'=>'required',
            'name'=>'nullable',
            'is_private'=>'nullable|boolean'
        ];
    }
}
