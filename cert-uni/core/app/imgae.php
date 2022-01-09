<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imgae extends Model
{
    protected $fillable = ['id','image','school'];

    protected $primaryKey = 'school';
}
