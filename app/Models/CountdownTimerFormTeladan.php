<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountdownTimerFormTeladan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countdown_timer_representative';

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
        'hr_id',
        //
        'date_time_open_appraisement',
        'date_time_expired_appraisement',
        'status_open_appraisement',
        'status_expired_appraisement',
        //
        'date_time_open_signature_human_resource_1',
        'date_time_expired_signature_human_resource_1',
        'status_open_signature_human_resource_1',
        'status_expired_signature_human_resource_1',
        //
        'date_time_open_signature_human_resource_2',
        'date_time_expired_signature_human_resource_2',
        'status_open_signature_human_resource_2',
        'status_expired_signature_human_resource_2',
        //
        'date_time_open_signature_human_resource_3',
        'date_time_expired_signature_human_resource_3',
        'status_open_signature_human_resource_3',
        'status_expired_signature_human_resource_3',
    ];

    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
    ];
}
