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
}
