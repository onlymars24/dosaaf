<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reset extends Model
{
    use HasFactory;

    protected $fillable = [
            'selector',
            'user_id',
            'last_request',
            'new_password'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
