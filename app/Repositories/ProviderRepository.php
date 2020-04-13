<?php


namespace App\Repositories;

use App\Models\Provider;

class ProviderRepository extends BaseRepository
{
    public function __construct(Provider $provider)
    {
        $this->$this->setModel($provider);
    }

}
