<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeurRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'localisation_id' => 'required|integer',
            'description' => 'nullable|string',
            'logo' => 'mimes:jpg,bmp,png',
            'email'  => 'nullable|string',
            'contact_1' => 'required|string|max:20',
            'contact_2' => 'nullable|string|max:20',
            'site_web' => 'nullable|url',
            'abonnement_id' => 'nullable|integer',
            'nombre_demandes_restantes',
            'lien_twitter' => 'nullable|url',
            'lien_facebook' => 'nullable|url',
            'lien_linkedin' => 'nullable|url',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->getErrorResponse(Response::HTTP_BAD_REQUEST, $validator->errors()));
    }
}
