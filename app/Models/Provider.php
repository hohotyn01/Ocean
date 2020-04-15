<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
        'token'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
