<?php


namespace App\Repositories;


use App\Models\SshKey;
use App\User;

class SshKeyRepository extends BaseRepository
{
    public function __construct(SshKey $sshKey)
    {
        $this->setModel($sshKey);
    }

    public function createSshKeyRelationUser(User $user, array $dataSsh)
    {
        return $user->sshKey()->create($dataSsh);
    }

    public function findSshKey(User $user)
    {
        return $this->model::where('user_id', $user->id)->get();
    }
}
