<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Project;
use App\Models\Permission;
use App\Http\Requests\UserCreateRequest;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $projects = Project::get();
        return view('users.create', compact('projects'));
    }

    public function store(UserCreateRequest $request)
    {
        $data = [
          'name'    => $request->name,
          'email'   => $request->email,
          'role_id' => $request->is_admin ?? 2,
        ];

        if ($request->password) {
          $data['password'] = \Hash::make($request->password);
        }

        $user = User::create($data);

        if($user->is_user()) {
            $data = [
              'projects'   => array_keys($request->projects),
            ];

            Permission::create([
              'user_id'  => $user->id,
              'data'     => json_encode($data),
            ]);
        }

        return redirect()->route('user.index')->with(['success' => 'User Added SuccessFully']);
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $projects              = Project::get();
        $userPermission   = $user->permissions;
        $permissionsData  = json_decode($userPermission->data ?? '', true);

        $data =  [
          'projects'              => $projects,
          'user'                  => $user,
          'userProjectPermission' => $permissionsData['projects'] ?? [],
        ];
        return view('users.create',$data);
    }

    public function update(UserCreateRequest $request, User $user)
    {
        $data = [
          'email'      => $request->email,
          'name'       => $request->name,
          'role_id'    => $request->is_admin ? 1 : 2
        ];

        if($request->filled('password')) {
          $data['password']   = \Hash::make($request->password);
        }

         $user->update($data);

         if ($user->is_user()) {
           $permissionsDatadata = [
             'projects'   => array_keys($request->projects),
           ];

           Permission::updateOrCreate([
             'user_id'          => $user->id,
           ], [
             'data' => json_encode($permissionsDatadata)
           ]);
         }
         return redirect()->route('user.index')->with(['success' => 'User Udpdated SuccessFully']);

    }

    public function destroy(User $user)
    {
        $user->delete();
        return response(['success' => 'User Deleted SuccessFully']);
    }
}
