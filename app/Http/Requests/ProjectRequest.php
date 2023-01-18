<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100|min:5',
            'client_name'=>'required|max:100|min:5',
            'summary'=>'required|max:500',
            'cover_image'=>'required|max:255|min:10'
        ];
    }

    public function messages(){
        return [

            'name.required'=>'Il nome del progetto è un campo obbligatorio',
            'name.max'=>'Il nome del progetto può essere lungo massimo :max caratteri',
            'name.min'=>'Il nome del progetto deve essere di almeno :min caratteri',

            'client_name.required'=>'Il nome del cliente è un campo obbligatorio',
            'client_name.max'=>'Il nome del cliente può essere lungo massimo :max caratteri',
            'client_name.min'=>'Il nome del cliente deve essere di almeno :min caratteri',

            'summary.required'=>'La descrizione del progetto è un campo obbligatorio',
            'summary.max'=>'La decrizione del progetto può essere lunga massimo :max caratteri',

            'cover_image.required'=>'La URL dell\'immagine è un campo obbligatorio',
            'cover_image.max'=>'La URL dell\'immagine può essere lunga massimo :max caratteri',
            'cover_image.min'=>'La URL dell\'immagine deve essere di almeno :min caratteri'

        ];
    }
}
