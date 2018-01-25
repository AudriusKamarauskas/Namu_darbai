<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class radar extends Model
{
    use softDeletes;
    protected $table = 'radars';

    protected $fillable = ['date', 'number', 'distance', 'time', 'deleted_at'];

    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driverId');
    }
}
