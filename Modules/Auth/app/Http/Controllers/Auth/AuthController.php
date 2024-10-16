<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Role\Models\Admin\Admin;
use Modules\Auth\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    use ResponseTrait;

    /********************************************************************************************/

    public function login(LoginRequest $request)
    {
        $requestData = $request->validated();
        $admin = $this->findAdminByEmail($requestData);
        $accessToken = $this->createAccessToken($admin);


        return $this->loginSuccess($accessToken, $admin->name, '', 'login successful', 200);
    }

    /********************************************************************************************/
    public function findAdminByEmail($requestData)
    {
        return Admin::where('email', $requestData['email'])->first();
    }
    /********************************************************************************************/
    public function createAccessToken($admin)
    {
        return $admin->createToken('#$_admin_app_token_@#')->plainTextToken;
    }
}
