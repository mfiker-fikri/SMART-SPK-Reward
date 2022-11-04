<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'full_name',
        'email',
        // 'email_verified_at',
        'username',
        'password',
        // 
        'last_seen',
        'status_active',
        'status_id'
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
        'id' => 'string',
    ];


    // Admins One To One Map Roles
    // public function mapRoles()
    // {
    //     return $this->hasOne(
    //         MapRoles::class,
    //         'user_email',
    //     );
    // }


    // public function authorizeRoles($roles)
    // {
    //     if ($this->hasAnyRole($roles)) {
    //         return true;
    //     }
    //     abort(401, 'This action is unauthorized.');
    // }

    // public function hasAnyRole($roles)
    // {
    //     if (is_array($roles)) {
    //         foreach ($roles as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }
    //     } else {
    //         if ($this->hasRole($roles)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    // public function hasRole($role)
    // {
    //     if ($this->roles()->where('name', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }
}
