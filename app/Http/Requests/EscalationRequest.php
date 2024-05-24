<?php

namespace App\Http\Requests;

use App\Models\Escalation;
use Illuminate\Foundation\Http\FormRequest;

class EscalationRequest extends FormRequest
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
            'ticket_id' => 'required',
            'original_user_id' => [
            'required',
                function ($attribute, $value, $fail) {
                    $exists = Escalation::where('ticket_id', $this->ticket_id)
                                         ->where('original_user_id', $value)
                                         ->exists();
                    if ($exists) {
                        $fail("La combinación de $attribute y ticket_id ya existe.");
                    }
                },
            ],
        ];
    }
}
