<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'list',
        'course_id',
        'priority',
        'alias'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}