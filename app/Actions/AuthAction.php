<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthAction
{
    /**
     * @param string $email
     * @param string $password
     * @return mixed
     * @throws ValidationException
     */
    public function handle(string $email, string $password)
    {
        $user = User::where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // assign & delete previous token
       $user->tokens()->delete();

       return $user->createToken($user->email . '-' . now())->plainTextToken;
    }
}
