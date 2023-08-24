<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

// class Pegawai extends Model
class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

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
        'photo_profile',
        'place_birth',
        'date_birth',
        //
        'nip',
        'pendidikan',
        'pangkat',
        'gol',
        'sk_cpns',
        'jabatan',
        'unit_kerja',
        //
        'admin_id',
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
        'id' => 'string',
        'email_verified_at' => 'datetime',
    ];

    // Pegawai One To Many Roles
    // public function mapRoles()
    // {
    //     return $this->hasMany(
    //         MapRoles::class,
    //         'user_email',
    //     );
    // }

    // Employees One To Many Reward_inovation
    public function rewardInovations()
    {
        return $this->hasMany(
            RewardInovation::class
        );
    }

    // Employees One To Many Reward_teladan
    public function rewardRepresentatives()
    {
        return $this->hasMany(
            RewardTeladan::class
        );
    }

    // public function finalResultInovations()
    // {
    //     return $this->belongsToMany(
    //         RewardInovation::class,
    //         'final_result_reward_inovation',
    //         'employees_id',
    //         'reward_inovation_id'
    //     );
    // }
}
