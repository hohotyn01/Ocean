<?php


namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->setModel($user);
    }
}
