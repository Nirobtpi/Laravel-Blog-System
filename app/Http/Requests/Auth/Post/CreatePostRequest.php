<?php

namespace App\Http\Requests\Auth\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'title'=>['required','string','max:255'],
            'description'=>['required'],
            'status'=>['required'],
            'category_id'=>['required'],
            'tags'=>['required','array'],
            'tags.*'=>['required','string'],
            'title.required'=>"Title Is Required",
            'description.required'=>"Description Is Required",
            'status.required'=>"Publish Is Required",
            'category_id.required'=>"Category Is Required",
            'tags.required'=>"Tags Is Required",
        ];
    }
}
