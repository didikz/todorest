<?php

namespace App\Actions\Todo;

use App\Models\User;

class CreateSectionService
{
    /**
     * @param User $user
     * @param string $content
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handler(User $user, string $content)
    {
        return $user->sections()->create([
            'content' => $content
        ]);
    }
}
