<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        //$users = User::all();
        $users = $this->userService->getAll();
        return view("admin.user-management", compact("users"));
    }

    public function add()
    {
        $roleUser = $this->userService->getAllRoles();
        return view("admin.user_add", compact("roleUser"));
    }
    public function edit(Request $request)
    {
        $id = $request->query("id");
        $user = $this->userService->findById($id);
        if (!$user) {
            return redirect()->route("admin.user-management")->with("error", "User not found !");
        }
        $roleUser = $this->userService->getAllRoles();
        return view("admin.user_edit", compact('user', "roleUser"));
    }
    public function createUser(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "phone" => "nullable|string|max:50",
            "active" => "required|boolean",
            "password" => "required|min:8|confirmed",
            "role_id" => "required|exists:roles,id",

        ]);
        $validate["password"] =  Hash::make($validate["password"]);
        $user = $this->userService->create([
            "name" => $validate["name"],
            "email" => $validate["email"],
            "phone" => $validate["phone"],
            "active" => $validate["active"],
            "password" => $validate["password"],
            "role_id" => $validate["role_id"]
        ]);
        if (!$user) {
            return redirect()->route("admin.user-management")->with("error", "User created failed !");
        }
        return redirect()->route("admin.user-management")->with("success", "User created successfully !");
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'active' => $request->has('active') ? 1 : 0  
        ]);
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $id,
            "phone" => "nullable|string|max:50",
            "active" => "required|boolean",
            "password" => "nullable|min:8|confirmed",
            "role_id" => "required|exists:roles,id",

        ]);
        if ($request->filled('password')) {
            $validate['password'] = Hash::make($request->password);
        } else {
            unset($validate['password']);
        }
        $updated = $this->userService->update($id, $validate);

        if (!$updated) {
            return redirect()->route("admin.user-management")->with("error", "User updated failed !");
        }
        return redirect()->route("admin.user-management")->with("success", "User updated successfully !");
    }

    public function delete($id)
    {
        $user = $this->userService->delete($id);

        if (!$user) {
            return redirect()->route("admin.user-management")->with("error", "User delete failed !");
        }
        return redirect()->route("admin.user-management")->with("success", "User delete successfully !");
    }
}
