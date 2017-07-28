<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //需要认证权限
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
            'name' =>'required'
        ];
    }

    public function messages(){
        return[
            'name.required' =>'项目名称是必填的！'
        ];
    }
}
