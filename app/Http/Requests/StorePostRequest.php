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
                'field'=>'required|min:10',
                'content'=>'required|min:20',
                'user_id'=>'exists:users,id',
                'img_name' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    
                //
            ];
            //
        
    }

    public function messages()
    {

        return [
            'field.required'=>"أدخل اسم المجال",
            'field.min'=>"اسم المجال قصير جدا",
            'content.required'=>"يجب ادخال محتوي",
            'content.min'=>"المحتوي يجب أن يحتوي علي معلومات كافية",
            'image.required'=>"يجب اختبار صورة معبرة",
            'image.max'=>"اختر صورة أقل حجما"
            
        ];

    }
}
