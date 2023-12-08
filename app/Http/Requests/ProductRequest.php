<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        $return = [];
        $return['name']='required|min:10';
        $return['article'] =[
            'required',
            'regex:/^[a-zA-Z0-9]+$/'];
        if(auth()->user()->is_admin){
            if($product) $return['article'][] = Rule::unique('products','article')->ignore($product->id);
            else   $return['article'][]= Rule::unique('products','article');
        }
        return $return;
    }

    public function messages(): array
    {
        return [
            'required'=>'Это поле должно быть заполнено',
            'unique'=>'Значение должно быть уникальным',
            'min'=>'Поле должно содержать минимум :min символов',
            'regex'=>'Поле должно содержать только латинские буквы и цифры'
        ];
    }
}
