<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'criterias';

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
        'criteria',
        'value_quality',
        'normalization',
        //
        'categorie_id',
        //
        'status_active',
        'status_id'
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

    public function categories()
    {
        return $this->belongsTo(
            Category::class,
            'categorie_id',
            'id'
        );
    }

    // Criterias One To Many Parameters
    public function parameters()
    {
        return $this->hasMany(
            Parameter::class
        );
    }
}
