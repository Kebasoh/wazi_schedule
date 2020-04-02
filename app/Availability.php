<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{
    use SoftDeletes;

    public $table = 'availability';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_id',
        'weekDay',
        'fromTime',
        'toTime',
        'exclusionDate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function availability()
    {
        return $this->hasMany(Employee::class, 'id');
    }
}
