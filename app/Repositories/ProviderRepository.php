<?php


namespace App\Repositories;

use App\Models\Provider;

class ProviderRepository extends BaseRepository
{
    public function __construct(Provider $provider)
    {
        $this->setModel($provider);
    }

    public function attach($user, $token)
    {
        $user->provider()->attach($token);

        return $user->provider()->attach($token);
    }

    public function pivot($user)
    {
        return $user->provider[0]->token;
    }
}
