<?php


namespace App\Services;

use App\Repositories\UserRepository;
use App\User;

class ProfileServices
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findProfile(User $user)
    {
        return $this->userRepository->find($user->id);
    }

    public function updateProfile(User $user, $profileRequest)
    {
        $dataProfile = $profileRequest->only(
            'name',
            'email'
        );

        $this->userRepository->update($user->id, $dataProfile);

        return response()->json(['success'], 200);
    }
}
