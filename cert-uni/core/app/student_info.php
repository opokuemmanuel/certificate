<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_info extends Model
{
    protected $fillable = ['id','Student_name','School','Program','Class','Year_of_completion'];

    protected $table = 'student_infos';
}
