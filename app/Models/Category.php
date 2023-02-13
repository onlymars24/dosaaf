<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Intramural;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function intramurals()
    {
        return $this->hasMany(Intramural::class);
    }
}
