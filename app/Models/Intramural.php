<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intramural extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'type_id',
        'avatar',
        'outsider_descr',
        'inner_descr',
        'doc',
        'hidden'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}