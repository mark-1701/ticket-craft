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
        // $attributes = $this->getAttributes();
        // $additionalAttributes = [
        //     'priority' => $this->priority,
        //     'customer' => $this->customer,
        //     'ticket_state' => $this->ticket_state,
        //     'type' => $this->type,
        //     'department' => $this->department
        // ];
        // $allAttributes = $additionalAttributes + $attributes;
        // return $allAttributes;

        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'priority_id' => $this->priority_id,
            'ticket_state_id' => $this->ticket_state_id,
            'type_id' => $this->type_id,
            'department_id' => $this->department_id,
            'subject' => $this->subject,
            'description' => $this->description,
            'resolution' => $this->resolution,
            'image_uri' => $this->image_uri,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'expired_at' => $this->expired_at,
            'priority' => $this->priority,
            'customer' => $this->customer,
            'ticket_state' => $this->ticket_state,
            'type' => $this->type,
            'department' => $this->department
        ];
    }
}
