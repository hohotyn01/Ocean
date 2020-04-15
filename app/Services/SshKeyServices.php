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

    public function newSshKey(User $user, $request)
    {
        $dataSsh = $request->only(
            'ssh_name',
            'ssh_key'
        );

        $this->sshKeyRepository->createSshKeyRelationUser($user, $dataSsh);

        return response()->json(['success'], 200);
    }

    public function findSsh(User $user)
    {
        return $this->sshKeyRepository->findSshKey($user);
    }

    public function deleteSsh(User $user, int $id)
    {
        $result = $this->sshKeyRepository->permissionDelete(
            $id,
            'user_id',
            $user->id
        );

        if ($result == 0){
            $result = response()->json(['This value Delete Forbidden'], 404);
        }

        return $result;
    }
}
