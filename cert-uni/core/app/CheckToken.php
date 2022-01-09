<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckToken extends Model
{
    protected $fillable = ['university_name','default_password'];

    protected $table = 'default_passwords';
}
