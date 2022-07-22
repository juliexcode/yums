<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required', 'email'],
            'tel' => ['required'],
            'date' => ['required', 'date', new DateBetween],
            'heure' => ['required'],
            'table_id' => ['required'],
            'personnes' => ['required'],
        ];
    }
}
