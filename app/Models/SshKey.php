<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class SshKey extends Model
{
    protected $table = 'ssh_keys';

    protected $fillable = [
        'ssh_name',
        'ssh_key'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
