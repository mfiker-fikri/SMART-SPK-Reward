<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalResultRewardInovation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'final_result_reward_inovation';

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
        //
        // 'employees_id',
        //
        'reward_inovation_id',
        //
        'score_final_result',
        // 'score_final_result_ranking',
        'score_final_result_description',
        //
        'status_id'
    ];

    // public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];

    // public function employees()
    // {
    //     return $this->belongsTo(
    //         Pegawai::class,
    //         'employee_id',
    //         'id'
    //     );
    // }

    public function resultFinalInovations()
    {
        return $this->belongsTo(
            RewardInovation::class,
            // 'final_result_reward_inovation',
            // 'employees_id',
            // 'reward_inovation_id'
        );
    }
}
