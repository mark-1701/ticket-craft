<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EscalationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'original_employee_id' => $this->original_employee_id,
            'destination_employee_id' => $this->original_employee_id,
            'escalation_state_id' => $this->escalation_state_id,
            'original_assignment_id' => $this->original_assignment_id,
            'destination_assignment_id' => $this->destination_assignment_id,
            'reason' => $this->reason,
            'original_employee' => $this->original_employee,
            'destination_employee' => $this->destination_employee,
            'escalation_state' => $this->escalation_state,
            'original_assignment' => $this->original_assignment,
            'destination_assignment' => $this->destination_assignment,
        ];
    }
}
