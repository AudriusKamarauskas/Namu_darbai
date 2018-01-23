<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class radar extends Model
{
    protected $table = 'radars';

    protected $fillable = ['date', 'number', 'distance', 'time'];
}
