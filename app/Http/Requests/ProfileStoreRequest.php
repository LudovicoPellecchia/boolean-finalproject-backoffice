<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool {

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     */

    public function rules(): array {

        return [

            "photo" => "nullable|image|",
            "phone" => "required|string|max:15",
            "location" => "required|string|max:50",
            "description" => "nullable|string|max:500",
            "skills" => "required|string|max:250",
            "curriculum" => "nullable|file",
            "visible"=> "boolean"
            
        ];

    }

/**
 * Get the error messages for the defined validation rules.
 */

public function messages(): array {

    return [
        
        'photo.image' => "L'immagine inserita deve essere in formato (jpg, jpeg, png, bmp, gif, svg, or webp)",
        'phone.required' => "Il numero di telefono è obbligatorio",
        'location.required' => "Inserisci la città in cui vivi",
        'description.max' => "La descrizione non deve superare i 500 caratteri (spazi compresi)",
        'skills.required' => "Inserisci almeno una tua competenza",
        'curriculum.file' => "L'allegato non è un file caricato",
        'visible.boolean' => "Seleziona almeno una delle due opzioni", 
        
    ];

}

}
