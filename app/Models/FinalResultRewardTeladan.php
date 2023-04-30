<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalResultRewardTeladan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'final_result_reward_teladan';

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
        'reward_teladan_id',
        //
        'score_final_result',
        'score_final_result_description',
        //
        'signature_head_of_the_human_resources_bureau',
        'name_head_of_the_human_resources_bureau',
        'verify_head_of_the_human_resources_bureau',
        //
        'signature_head_of_disciplinary_awards_and_administration',
        'name_head_of_disciplinary_awards_and_administration',
        'verify_head_of_disciplinary_awards_and_administration',
        //
        'signature_head_of_rewards_discipline_and_pension_subdivision',
        'name_head_of_rewards_discipline_and_pension_subdivision',
        'verify_head_of_rewards_discipline_and_pension_subdivision',
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

    public function resultFinalRepresentatives()
    {
        return $this->belongsTo(
            RewardTeladan::class,
            // 'final_result_reward_inovation',
            'reward_teladan_id',
            'id',
        );
    }
}
