<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    use ResponseTrait;

    /********************************************************************************************/

    public function login(LoginRequest $request)
    {
        $requestData = $request->validated();
        $user = $this->findUserByEmail($requestData);
        $auth_user = $this->authUser($user);
        $accessToken = $this->createAccessToken($auth_user);

        return $this->loginSuccess($accessToken,$auth_user->name,'','login successful',200);
    }

    /********************************************************************************************/
    public function findUserByEmail($requestData)
    {
        $user = User::where('email',$requestData['email'])->first();
        return $user;
    }

    /********************************************************************************************/
    public function authUser($user)
    {
        Auth::login($user);
        $authUser = Auth::user();
        return $authUser;
    }
    /********************************************************************************************/
    public function createAccessToken($user)
    {
        $accessToken = $user->createToken('#$_my_app_token_@#')->plainTextToken;
        return $accessToken;
    }
}
