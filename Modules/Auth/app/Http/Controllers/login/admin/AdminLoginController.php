<?php

namespace Modules\Auth\Http\Controllers\login\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Role\Models\Admin\Admin;
use Illuminate\Support\Facades\Route;
use Modules\Staff\Models\Employee\Employee;
use Modules\Auth\Http\Requests\Auth\login\admin\AdminLoginRequest;

class AdminLoginController extends Controller
{
    use ResponseTrait;

    /********************************************************************************************/

    public function login(AdminLoginRequest $request)
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
