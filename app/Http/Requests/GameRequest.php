<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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

public function messages()
{
return [
'name.required' => 'Ripperiono',
'description.required'  => 'Dikke memes',
];
}
/**
* Get the validation rules that apply to the request.
*
* @return array
*/
public function rules()
{
return [
'name' => 'required|unique:posts|max:255',
'description' => 'required',
];
}

}