<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TeacherCourse extends Model
{
    //
    protected $table = 'teacher_courses';

    //protected $primaryKey = ['teacher_id', 'course_id'];
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('teacher_id', '=', $this->getAttribute('teacher_id'))
            ->where('course_id', '=', $this->getAttribute('course_id'));
        return $query;
    }
}
