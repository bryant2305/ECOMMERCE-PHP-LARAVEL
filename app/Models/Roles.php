<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id');
    }
}
