<?php


namespace App\Services;


use App\Repositories\ProviderRepository;
use App\User;


class ProviderServices
{
    private $providerRepository;

    public function __construct(ProviderRepository $providerRepository)
    {
        $this->providerRepository = $providerRepository;
    }

    public function findProvider(User $user)
    {
        return $this->providerRepository->find($user->id);
    }

    public function createProvider(User $user, $request)
    {
        $dataProvider = $request->only(
            'token'
        );

        $token = $this->providerRepository->create($dataProvider);

        $this->providerRepository->attach($user, $token);

        return response()->json(['success'], 200);
    }
}
