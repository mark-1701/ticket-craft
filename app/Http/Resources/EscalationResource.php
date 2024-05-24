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
            'original_user_id' => $this->original_user_id,
            'destination_user_id' => $this->destination_user_id,
            'escalation_state_id' => $this->escalation_state_id,
            'original_assignment_id' => $this->original_assignment_id,
            'destination_assignment_id' => $this->destination_assignment_id,
            'reason' => $this->reason,
            'ticket' => $this->ticket,
            // 'original_user' => $this->original_user,
            // 'destination_user' => $this->destination_user,
            // 'escalation_state' => $this->escalation_state,
            // 'original_assignment' => $this->original_assignment,
            // 'destination_assignment' => $this->destination_assignment,
        ];
    }
}
