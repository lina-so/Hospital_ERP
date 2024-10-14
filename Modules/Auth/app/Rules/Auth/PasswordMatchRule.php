<?php

namespace Modules\Auth\Rules\Auth;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordMatchRule implements ValidationRule
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email',$this->email)->first();
        if(!Hash::check($value, $user->password))
        {
            $fail('The provided password does not match our records.');
        }
    }
}
