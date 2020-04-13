<?php


namespace App\Repositories;


use App\Models\Server;

class ServerRepository extends BaseRepository
{
    public function __construct(Server $server)
    {
        $this->$this->setModel($server);
    }
}
