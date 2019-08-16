<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Table for this Model.
     *
     * @var string
     */
    public $table = 'tr_projects'; // table for this model

    /**
     * Disable created_at and updated_at timestamp
     * columns.
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Properties that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
