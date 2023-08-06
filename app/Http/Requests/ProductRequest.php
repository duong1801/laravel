<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
class ProductRequest extends FormRequest
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
            "name" => "required",
            "description" => "required"
        ];
    }

//    public function withValidator($validator)
//    {
//        $validator->after(function ($validator) {
//            if ($validator->errors()->count() > 0) {
//                $validator->errors()->add(
//                    'msg', 'Đã có lỗi xảy ra'
//                );
//            }
//        });
//    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                    $validator->errors()->add(
                         'msg',
                        'Đã có lỗi xảy ra!'
                    );
            }
        ];
    }


}
