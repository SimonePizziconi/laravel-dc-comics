<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'series' => 'required|min:5|max:255',
            'thumb' => 'required|url|max:255',
            'price' => 'required|min:0',
            'type' => 'required|min:3|max:30',

        ];
    }

    public function messages()
    {
        return [

            'series.required' => 'Il campo nome fumetto è obbligatorio.',
            'series.min' => 'Il campo nome fumetto deve avere :min caratteri.',
            'series.max' => 'Il campo nome fumetto può avere :max caratteri.',
            'thumb.required' => 'Il campo copertina fumetto è obbligatorio.',
            'thumb.url' => 'Inserisci un URL valido per la copertina.',
            'thumb.max' => 'Il campo copertina fumetto può avere :max caratteri.',
            'price.required' => 'Il campo prezzo è obbligatorio.',
            'price.min' => 'Il prezzo deve essere almeno :min.',
            'type.required' => 'Il campo tipo fumetto è obbligatorio.',
            'type.min' => 'Il campo tipo fumetto deve avere :min caratteri.',
            'type.max' => 'Il campo tipo fumetto può avere :max caratteri.',

        ];
    }
}
