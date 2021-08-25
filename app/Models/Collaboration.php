<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id' ,
        'course_two_id',
        'f_student_id',
        's_student_d',
        'hours',
        'status',
        'schoolyear_id',
        'description'
    ];
}
