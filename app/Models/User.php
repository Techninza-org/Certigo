<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role', // The integer role_id
        'designation',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship with the Role model.
     */
    public function roleRelation()
    {
        // Define the relationship
        return $this->belongsTo(Role::class, 'role', 'role_id');
    }

    /**
     * Check if the user has a specific permission or set of permissions.
     *
     * @param string|array $permissions
     * @return bool
     */
    public function hasPermission($permissions)
    {
        // Fetch the user's role permissions via the relationship
        $rolePermissions = $this->roleRelation?->permissions;

        if (!$rolePermissions) {
            return false;
        }

        // Convert permissions string to array
        $rolePermissionsArray = explode(',', $rolePermissions);

        // Check if single permission or array of permissions is present
        if (is_array($permissions)) {
            return !empty(array_intersect($permissions, $rolePermissionsArray));
        }

        return in_array($permissions, $rolePermissionsArray);
    }
}