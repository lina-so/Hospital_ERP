<?php

namespace Modules\Auth\Rules\Auth;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\Role\Models\Admin\Admin;
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
        // dd($this->email);
        $admin = Admin::where('email', $this->email)->first();

        if ($admin === null || !Hash::check($value, $admin->password)) {
            $fail('The provided password does not match our records.');
        }
    }
}
