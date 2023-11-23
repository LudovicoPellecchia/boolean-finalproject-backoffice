<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileStoreRequest extends FormRequest
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
     */

    public function rules(): array
    {

        return [

            "photo" => "nullable|file|mimes:jpeg,png,jpg",
            "phone" => "required|string|max:15",
            "location" => "required|string|max:50",
            "specializations" => "required|array",
            "description" => "nullable|string|max:500",
            "skills" => "required|string|max:250",
            "curriculum" => "nullable|file|mimes:pdf",
            "visible" => "required|boolean"

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {

        return [

            'photo.file' => "L'immagine inserita deve essere in formato (jpeg,png,jpg)",
            'phone.required' => "Il numero di telefono è obbligatorio",
            'location.required' => "Inserisci la città in cui vivi",
            'specializations.required' => "Seleziona almeno una specializzazione",
            'description.max' => "La descrizione non deve superare i 500 caratteri (spazi compresi)",
            'skills.required' => "Inserisci almeno una tua competenza",
            'curriculum.file' => "Il file caricato non è in formato pdf",
            'visible.boolean' => "Seleziona almeno una delle due opzioni",

        ];
    }
}
