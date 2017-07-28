<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //需要具备认证权限
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
            'name' => 'required|unique:projects',
           'thumbnail' => 'image'
        ];
    }


    public function messages(){
        return [
            'name.required' => '项目名称是必填的！',
            'name.unique' =>'很抱歉，此项目名称已经被占用，请重新填写!',
            'thumbnail.image' => '请上传图片格式的文件!',

        ];
    }
}
