<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use softDeletes;

    protected $primaryKey = 'driverId';
    
    protected $table = 'drivers';

    protected $fillable = ['name', 'city'];

    protected $foreignKey = 'driver_id';

    public function radars()
    {
        return $this->hasMany(Radar::class, 'driver_id', 'driverId');
    }
}
