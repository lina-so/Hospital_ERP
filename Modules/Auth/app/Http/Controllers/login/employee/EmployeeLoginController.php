<?php

namespace Modules\Auth\Http\Controllers\login\employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Role\Models\Admin\Admin;
use Illuminate\Support\Facades\Route;
use Modules\Staff\Models\Employee\Employee;
use Modules\Auth\Http\Requests\Auth\login\employee\EmployeeLoginRequest;

class EmployeeLoginController extends Controller
{
    use ResponseTrait;

    /********************************************************************************************/

    public function login(EmployeeLoginRequest $request)
    {
        // dd(request()->route()->getName());
        // dd(Route::current()->uri);
        $requestData = $request->validated();
        $employee = $this->findAdminByEmail($requestData);
        $accessToken = $this->createAccessToken($employee);


        return $this->loginSuccess($accessToken, $employee->first_name, '', 'login successful', 200);
    }

    /********************************************************************************************/
    public function findAdminByEmail($requestData)
    {
        return Employee::where('email', $requestData['email'])->first();
    }
    /********************************************************************************************/
    public function createAccessToken($employee)
    {
        return $employee->createToken('#$_admin_app_token_@#')->plainTextToken;
    }
}
