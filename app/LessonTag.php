<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTag extends Model
{
    protected $fillable = ['lesson_id', 'tag_id'];
}
