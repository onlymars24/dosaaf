<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'list',
        'entire_progress',
        'passed',
        'alias'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
