<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_permissions', 'permission_id', 'role_id');
    }

}
