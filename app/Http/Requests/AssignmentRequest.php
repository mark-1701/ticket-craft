<?php

namespace App\Http\Requests;

use App\Models\Assignment;
use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
            'employee_id' => [
            'required',
                function ($attribute, $value, $fail) {
                    $exists = Assignment::where('ticket_id', $this->ticket_id)
                                         ->where('employee_id', $value)
                                         ->exists();
                    if ($exists) {
                        $fail("La combinación de $attribute y ticket_id ya existe.");
                    }
                },
            ],
        ];
    }
}
