<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $fillable = ['id','image','school'];

    protected $table = 'imgaes';
}
