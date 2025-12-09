<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'username'     => $this->username,
            'email'        => $this->email,
            'role'         => $this->role,
            'avatar'       => $this->avatar,
            'display_name' => $this->display_name,
            'bio'          => $this->bio,
            'location'     => $this->location,
            'website'      => $this->website,
            'created_at'   => $this->created_at->toDateTimeString(),
        ];
    }
}
