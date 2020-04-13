<?php


namespace App\Repositories;


use App\Models\SshKey;

class SshKeyRepository extends BaseRepository
{
    public function __construct(SshKey $sshKey)
    {
        $this->$this->setModel($sshKey);
    }
}
