<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\User;
use App\Models\Category;
use App\Models\Type;
use App\Models\Progress;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'descr',
        'price',
        'period',
        'avatar',
        'docs',
        'category_id',
        'type_id',
        'hidden'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}