<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $attributes = $this->getAttributes();
        $additionalAttributes = [
            'priority' => $this->priority,
            'customer' => $this->customer,
            'ticket_state' => $this->ticket_state,
            'type' => $this->type,
            'department' => $this->department
        ];
        $allAttributes = array_merge($attributes, $additionalAttributes);
        return $allAttributes;
    }
}
