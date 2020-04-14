<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\SshKeyServices;
use App\Http\Requests\SshRequest;

class SettingsController extends Controller
{
    protected $sshKeyServices;

    public function __construct(
        SshKeyServices $sshKeyServices
    ) {
        $this->sshKeyServices = $sshKeyServices;
    }

    public function setting()
    {
        return view('settings');
    }

    public function createSsh(SshRequest $request)
    {
        $dataSsh = $request->only(
            'ssh_name',
            'ssh_key'
        );

        return $this->sshKeyServices->newSshKey(
            Auth::user(),
            $dataSsh
        );
    }

    public function findSsh()
    {
        return $this->sshKeyServices->findSsh(Auth::user());
    }
}
