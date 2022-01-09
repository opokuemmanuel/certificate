<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = ['department_name','school'];

    protected $table = 'departments';
}
