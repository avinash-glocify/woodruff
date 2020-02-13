<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Project;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin()
    {
       return $this->role_id == 1 ? true: false;
    }

    public function is_user()
    {
       return $this->role_id == 2 ? true: false;
    }

    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    public function permissions()
    {
        return $this->hasOne(\App\Models\Permission::class);
    }

    public function permissionsData()
    {
        return json_decode($this->permissions->data ?? '', true) ?? [];
    }


    public function userProjectPermissions()
    {
        $permissions      = $this->permissionsData();
        $permissions      = $permissions['projects'] ?? [];
        return $permissions;
    }

    public function userPermissions()
    {
        $permissions      = $this->permissionsData();
        $permissions      = $permissions['permission'] ?? [];
        return $permissions;
    }

    public function userSetupPermissions()
    {
        $permissions      = $this->permissionsData();
        $permissions      = $permissions['setup'] ?? [];
        return $permissions;
    }

}
