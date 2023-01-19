<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardInovation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reward_inovation';

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
        'upload_file_short_description',
        'upload_file_image_support',
        'upload_file_video_support',
        //
        'employee_id',
        //
        'status_process',
        //
        'score_valuation_1',
        'score_valuation_2',
        'score_valuation_3',
        'score_valuation_4',
        'score_valuation_5',
        'score_valuation_6',
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

    public function employees()
    {
        return $this->belongsTo(
            Pegawai::class,
            'employee_id',
            'id'
        );
    }
}
