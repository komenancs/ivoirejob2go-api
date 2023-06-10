<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'surname' => 'required|string',
            'password' => 'required|string',
            'telephone' => 'nullable|string',
            'nom_entreprise' => 'nullable|string',
            'poste_occupe' => 'nullable|string',
            'photo' => 'nullable|mimes:jpg,bmp,png',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'date_verification_email' => 'nullable|date',
            'role_id' => 'required|interger',
            'localisation_id'  => 'required|integer',
            'remember_token' => 'nullable|datetime',
            'email_verified_at' => 'nullable|datetime',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->getErrorResponse(Response::HTTP_BAD_REQUEST, $validator->errors()));
    }
}
