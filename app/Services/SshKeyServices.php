<?php


namespace App\Services;

use App\Repositories\SshKeyRepository;
use App\User;

class SshKeyServices
{
    private $sshKeyRepository;

    public function __construct(SshKeyRepository $sshKeyRepository)
    {
        $this->sshKeyRepository = $sshKeyRepository;
    }

    public function newSshKey(User $user, array $dataSsh)
    {
        $this->sshKeyRepository->createSshKeyRelationUser($user, $dataSsh);

        $response = response()->json(['success'], 200);

        return $response;
    }

    public function findSsh(User $user)
    {
        return $this->sshKeyRepository->findSshKey($user);
    }
}
